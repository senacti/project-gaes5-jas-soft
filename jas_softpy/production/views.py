import os

from django.views import View
from django.http import HttpResponse
from django.conf import settings
from django.template.loader import get_template
from xhtml2pdf import pisa
from django.contrib.staticfiles import finders


class ProductionInvoicePdfView(View):
    def get(self, request, *args, **kwargs):
        
        template = get_template('product_invoice.html')
        context = {'title': 'Mi primer pdf'}
        
        response = HttpResponse(content_type='application/pdf')
        response['Content-Type'] = 'production/pdf'
        
        html = template.render(context)
        pisa_status = pisa.CreatePDF(   
            html, dest=response)
        
        if pisa_status.err:
            return HttpResponse('We had some errors <pre>' + html + '</pre>')
        return response        
   
    