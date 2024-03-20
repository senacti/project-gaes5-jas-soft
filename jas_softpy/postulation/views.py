import os

from django.shortcuts import render
from django.views import View
from django.http import HttpResponse
from django.conf import settings
from django.template.loader import get_template
from xhtml2pdf import pisa
from django.contrib.staticfiles import finders

from django.views.generic.list import ListView
from django.views.generic.detail import DetailView
from .models import Employed, Postulation

class PostulationInvoicePdfView(View):
     
     
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
        
        template = get_template('postulation/postulation_invoice.html')
        context = {
            'sales': Postulation.objects.all(),
            'comp': {'name': 'PROMOPLAST S.A.S', 'addres' : 'Bogotá, Colombia'},
            'icon': '{}{}'.format(settings.STATIC_URL, 'img/logo.png')
            }
        
        response = HttpResponse(content_type='application/pdf')
        response['Content-Disposition'] = 'attachment; filename="postulationreport.pdf"'
        
        html = template.render(context)
        pisa_status = pisa.CreatePDF(   
            html, dest=response,
            #link_callback=self.link_callback
        )
                
        
        if pisa_status.err:
            return HttpResponse('We had some errors <pre>' + html + '</pre>')
        return response



class PostulationListView(ListView):
    template_name = "postulation/Postulacion.html"
    queryset = Postulation.objects.all().order_by('-id')
    context_object_name = 'postulation'
    
    

    def get_context_data(self, **kwargs):
        context = super().get_context_data(**kwargs)
        context['message'] = 'Listado Postulaciones'
        context['employed'] = Employed.objects.all()
        
        return context