from pyexpat.errors import messages
from typing import Any
from django.shortcuts import render
from django.shortcuts import redirect
from django.urls import reverse_lazy
from django.views.generic.list import ListView
import os
from django.views.generic.edit import DeleteView

from django.views import View
from django.http import HttpResponse
from django.conf import settings
from django.template.loader import get_template

from xhtml2pdf import pisa
from django.contrib.staticfiles import finders

from django import forms
from .models import Supplies,ProductionOrder


class CreateProductionOrderForm(forms.ModelForm):
    class Meta:
        model = ProductionOrder
        fields = ['quantity_used', 'supplies']
        stock = forms.IntegerField(required=True, widget=forms.IntegerField)
        supplies = forms.CharField(required=True)

class DeleteProductionOrderView(DeleteView):
    model = ProductionOrder
    template_name = 'production/ordenpedido.html'  # Ajusta según tu aplicación
    success_url = reverse_lazy('eliminar_orden_pedido')  # Ajusta según tu aplicación

    def delete(self, request, *args, **kwargs):
        messages.success(self.request, 'Orden de producción eliminada exitosamente.')
        return super().delete(request, *args, **kwargs)

class ProductionListView(ListView):
        
        template_name = "production/ordenpedido.html"
        queryset = ProductionOrder.objects.all().order_by('-Production_OrderDate')
        
        def get_context_data(self, **kwargs):
                context = super().get_context_data(**kwargs)
                context['message'] = 'PRODUCCION | ORDEN DE PEDIDO'                
                return context
        
        
class ProductionInvoicePdfView(View):
    
        def link_callback(self, uri, rel):
               
                result = finders.find(uri)
                if result:
                        if not isinstance(result, (list, tuple)):
                                result = [result]
                        result = list(os.path.realpath(path) for path in result)
                        path=result[0]
                else:
                        sUrl = settings.STATIC_URL        
                        sRoot = settings.STATIC_ROOT     
                        mUrl = settings.MEDIA_URL         
                        mRoot = settings.MEDIA_ROOT       

                        if uri.startswith(mUrl):
                                path = os.path.join(mRoot, uri.replace(mUrl, ""))
                        elif uri.startswith(sUrl):
                                path = os.path.join(sRoot, uri.replace(sUrl, ""))
                        else:
                                return uri
                
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
                )
                        
                
                if pisa_status.err:
                        return HttpResponse('We had some errors <pre>' + html + '</pre>')
                return response    
        

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
