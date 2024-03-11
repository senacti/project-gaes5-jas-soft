from django.db.models.query import QuerySet
from django.shortcuts import render
from .models import Product
from django.views import View
from django.http import HttpResponse
from django.conf import settings
from django.template.loader import get_template
from xhtml2pdf import pisa
from django.contrib.staticfiles import finders

from django.views.generic.list import ListView
from django.views.generic.detail import DetailView

class InventoryInvoicePdfView(View):
    
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

                template = get_template('inventory/inventory_invoice.html')
                context = {
                'product': Product.objects.all(),
                'comp': {'name': 'PROMOPLAST S.A.S'},
                # 'icon': '{}{}'.format(settings.STATIC_URL, 'img/logo.png')
                }

                response = HttpResponse(content_type='application/pdf')
                response['Content-Disposition'] = 'attachment; filename="productreport.pdf"'

                html = template.render(context)
                pisa_status = pisa.CreatePDF(
                html, dest=response,
                # link_callback=self.link_callback
                )

                if pisa_status.err:
                        return HttpResponse('We had some errors <pre>' + html + '</pre>')
                return response

class ProductListViewInventory(ListView):
    template_name = "inventory/producto.html"
    queryset = Product.objects.exclude(image__isnull=True).order_by('-fabricationDate')

    def get_context_data(self, **kwargs):
        context = super().get_context_data(**kwargs)
        context['message'] = 'INVENTARIO | PRODUCTOS'
        print(context)
        return context

class ProductListViewCatalogo(ListView):
    template_name = "catalogo.html"
    queryset = Product.objects.all().order_by('-id')

    def get_context_data(self, **kwargs):
        context = super().get_context_data(**kwargs)
        context['message'] = 'Listado de productos'
        
        return context

class ProductDeatilView(DetailView):
        model = Product
        template_name = 'inventory/product.html'
        
        def get_context_data(self, **kwargs):
                context = super().get_context_data( **kwargs)
        
                print(context)
        
                return context
        
class ProductSearchListView(ListView):
        template_name = 'inventory/search.html'
        
        def get_queryset(self):
                return Product.objects.filter(name__icontains=self.query())
        
        def query(self):
                return self.request.GET.get('q')
        
        def get_context_data(self, **kwargs):
                 context = super().get_context_data(**kwargs)
                 context['query'] = self.query()
                 context['count'] = context['product_list'].count() if 'product_list' in context else 0
                 return context

        
        
# Create your views here.


