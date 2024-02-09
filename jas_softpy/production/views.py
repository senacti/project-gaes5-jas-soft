from pyexpat.errors import messages
from typing import Any
from django.shortcuts import get_object_or_404, render
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

from .forms import CreateProductionOrderForm
from .models import Supplies,ProductionOrder

class DeleteProductionOrderView(DeleteView):
    model = ProductionOrder
    template_name = 'production/ordenpedido.html'  
    success_url = reverse_lazy('eliminar_orden_pedido')  

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
        
def create_production_order(request):
    if request.method == 'POST':
        form = CreateProductionOrderForm(request.POST)
        if form.is_valid():
            production_order_instance = form.save(commit=False)
            quantity_used = form.cleaned_data['stock']
            supplies_id = form.cleaned_data['supplies']

            supplies_instance = Supplies.objects.get(id=supplies_id)
            supplies_instance.stock -= quantity_used
            supplies_instance.save()

            production_order_instance.save()

            messages.success(request, '¡Orden de producción creada exitosamente!')
            return redirect('ordenpedido')
        else:           
            print(form.errors)
    else:
        form = CreateProductionOrderForm()
        
    supplies = Supplies.objects.all()
    
    return render(request, 'production/create_productionorder.html', {'form': form})

def edit_production_order(request, id):
        productionorder = ProductionOrder.objects.get(id=id)
        return render(request, "EditProductOrder.html", {"id": id})


def editProductionOrder(request):
    quantity_used = request.POST['quantity_used']
    supplies = request.POST['supplies']    

    productionorder = ProductionOrder.objects.get(id=id)
    productionorder.quantity_used = quantity_used
    productionorder.supplies = supplies
    productionorder.save()

    messages.success(request, '¡Orden de producción actualizado!')

    return redirect('ordenpedido')


def deleteProductionOrder(request, id):
    
    id = get_object_or_404(ProductionOrder, id=id)
    id.delete()

    messages.success(request, 'Orden de producción eliminado!')

    return redirect('ordenpedido')         
        
