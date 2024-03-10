from typing import Any
from django.views.generic.list import ListView
from django.db.models.functions import TruncDate,TruncMonth
from django.db.models import DateField
from django.db.models.functions import Cast
from django.db.models import Sum,Max,Count
from django.template.loader import get_template

import os

from django.views import View
from django.http import HttpResponse
from django.conf import settings
from xhtml2pdf import pisa
from django.contrib.staticfiles import finders
from .models import Supplies,ProductionOrder,SupplieProduction


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
        model = SupplieProduction
        context_object_name = 'name'

        def get_context_data(self, **kwargs):
                context = super().get_context_data(**kwargs)
                
                context['lista_insumos'] = Supplies.objects.annotate()
                context['orden_pedido']  = SupplieProduction.objects.annotate(
                        order_date=TruncDate('Production_OrderDate'),
                        total_quantity=Sum('quantity'),
                        supplies_count=Count('supplies'),
                )
                return context
                       
               
                #paso 1 recorrer el objeto 
                #paso 2 -obtener production_order_id, nombre
                #paso 3 -obtener recorrer nuevamene el objeto
                #paso 4 -condiciona si production_order_id es igual al array 2
                #paso 5 -guardar el  un objeto con fecha nombre cantidad etc, como se vera visualizado en la vista 
                
                #i= {id=1,order_date=01/01/2023,supplies ='nombre,nombre2',total_quantity=cantidad1 + cantidad2 =4},{id=1,fecha=01/01/2023,nombre,nombre2},{id=1,fecha=01/01/2023,nombre,nombre2},{id=1,fecha=01/01/2023,nombre,nombre2},{id=1,fecha=01/01/2023,nombre,nombre2}
                
                #context['orden_pedido'] = 1
                

                #return Supplies.objects.annotate()   
                
        """template_name = "production/ordenpedido.html"
        model = SupplieProduction
        context_object_name = 'production_orders'
        
        def get_queryset(self):
                return SupplieProduction.objects.annotate(
                        order_date=TruncDate('Production_OrderDate'),
                        total_quantity=Sum('quantity'),
                        supplies_count=Count('supplies'),
                ).order_by('-order_date')     """
                       
class SuppliesListView(ListView):        
        template_name = "supplies/insumo.html"
        queryset = Supplies.objects.all().order_by('supplieCode')
        context_object_name = 'supplies'
        
        def get_context_data(self, **kwargs):
                context = super().get_context_data(**kwargs)
                context['message'] = 'PRODUCCION | INSUMOS'

                daily_production = SupplieProduction.objects.annotate(
                        day=TruncDate('Production_OrderDate')
                ).values('day').annotate(
                        total_quantity=Sum('quantity')
                )

                daily_labels = [entry['day'].strftime('%Y-%m-%d') for entry in daily_production]
                daily_data = [entry['total_quantity'] for entry in daily_production]


                monthly_production = SupplieProduction.objects.annotate(
                        month=TruncMonth('Production_OrderDate')
                ).values('month').annotate(
                        total_quantity=Sum('quantity')
                )

                monthly_labels = [str(entry['month']) for entry in monthly_production]
                monthly_data = [entry['total_quantity'] for entry in monthly_production]

                context['daily_chart_labels'] = daily_labels
                context['daily_chart_data'] = daily_data
                context['monthly_chart_labels'] = monthly_labels
                context['monthly_chart_data'] = monthly_data
                
                production_orders = context['object_list']
                production_orders = []
                
                for supply in production_orders:
                        production_orders.extend(list(SupplieProduction.objects.filter(supplies=supply).all()))

                context['production_orders'] = production_orders

                return context

       
                

        
        

        
                
        

