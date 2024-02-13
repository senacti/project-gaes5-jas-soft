from typing import Any
from django.views.generic.list import ListView
from django.db.models.functions import TruncDate
from django.template.loader import get_template

import os

from django.db.models import Sum
from django.views import View
from django.http import HttpResponse
from django.conf import settings
from xhtml2pdf import pisa
from django.contrib.staticfiles import finders
from .models import Supplies,ProductionOrder


        
class ProductionInvoicePdfView(View):
    
        def link_callback(self, uri, rel):
                """
                Convert HTML URIs to absolute system paths so xhtml2pdf can access those
                resources
                """
                result = finders.find(uri)
                if result:
                        if not isinstance(result, (list, tuple)):
                                result = [result]
                        result = list(os.path.realpath(path) for path in result)
                        path=result[0]
                else:
                        sUrl = settings.STATIC_URL        # Typically /static/
                        sRoot = settings.STATIC_ROOT      # Typically /home/userX/project_static/
                        mUrl = settings.MEDIA_URL         # Typically /media/
                        mRoot = settings.MEDIA_ROOT       # Typically /home/userX/project_static/media/

                        if uri.startswith(mUrl):
                                path = os.path.join(mRoot, uri.replace(mUrl, ""))
                        elif uri.startswith(sUrl):
                                path = os.path.join(sRoot, uri.replace(sUrl, ""))
                        else:
                                return uri

                # make sure that file exists
                if not os.path.isfile(path):
                        raise RuntimeError(
                                'media URI must start with %s or %s' % (sUrl, mUrl)
                        )
                return path
                
        def get(self, request, *args, **kwargs):
                
                template = get_template('production/product_invoice.html')
                context = {
                'supplies': Supplies.objects.all(),
                'comp': {'name': 'PROMOPLAST S.A.S', 'addres' : 'Bogotá, Colombia'},
                'icon': '{}{}'.format(settings.STATIC_URL, 'img/logo.png')
                }
                
                response = HttpResponse(content_type='application/pdf')
                response['Content-Disposition'] = 'attachment; filename="suppliesreport.pdf"'
                
                html = template.render(context)
                pisa_status = pisa.CreatePDF(   
                html, dest=response,
                #link_callback=self.link_callback
                )
                                        
                if pisa_status.err:
                        return HttpResponse('We had some errors <pre>' + html + '</pre>')
                return response        

class ProductionListView(ListView):
        
        template_name = "production/ordenpedido.html"
        queryset = ProductionOrder.objects.all().order_by('-Production_OrderDate')
        
        def get_context_data(self, **kwargs):
                context = super().get_context_data(**kwargs)
                context['message'] = 'PRODUCCION | ORDEN DE PEDIDO'

                daily_production = ProductionOrder.objects.annotate(date=TruncDate('Production_OrderDate')).values('date').annotate(total_quantity=Sum('quantity_used'))

                labels = [entry['date'].strftime('%Y-%m-%d') for entry in daily_production]
                data = [entry['total_quantity'] for entry in daily_production]

                context['chart_labels'] = labels
                context['chart_data'] = data
                
                return context
                       
class SuppliesListView(ListView):
        
        template_name = "supplies/insumo.html"
        queryset = Supplies.objects.all().order_by('supplieCode')
        
        def get_context_data(self, **kwargs):
                context = super().get_context_data(**kwargs)
                context['message'] = 'PRODUCCION | INSUMOS'
                print(context)
                return context
        
        
"""      
def editar_orden_pedido(request, pk):
    orden_pedido = get_object_or_404(ProductionOrder, pk=pk)

    if request.method == 'POST':
        form = TuFormulario(request.POST, instance=orden_pedido)
        if form.is_valid():
            form.save()
            # Puedes redirigir a alguna página de éxito o mostrar un mensaje aquí
    else:
        form = TuFormulario(instance=orden_pedido)

    return render(request, 'production/ordenpedido.html', {'form': form})

def eliminar_orden_pedido(request, pk):
    orden_pedido = get_object_or_404(ProductionOrder, pk=pk)

    if request.method == 'POST':
        orden_pedido.delete()
        # Puedes redirigir a alguna página de éxito o mostrar un mensaje aquí
        return redirect('tu_nombre_de_url')  # Cambia 'tu_nombre_de_url' por la URL a la que deseas redirigir

    return render(request, 'ordenpedido.html', {'orden_pedido': orden_pedido})
"""
    