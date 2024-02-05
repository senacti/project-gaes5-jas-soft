"""
URL configuration for jas_softpy project.

The `urlpatterns` list routes URLs to views. For more information please see:
    https://docs.djangoproject.com/en/4.2/topics/http/urls/
Examples:
Function views
    1. Add an import:  from my_app import views
    2. Add a URL to urlpatterns:  path('', views.home, name='home')
Class-based views
    1. Add an import:  from other_app.views import Home
    2. Add a URL to urlpatterns:  path('', Home.as_view(), name='home')
Including another URLconf
    1. Import the include() function: from django.urls import include, path
    2. Add a URL to urlpatterns:  path('blog/', include('blog.urls'))
"""
from django.contrib import admin
from django.urls import path
from . import views
from django.conf import settings
from django.conf.urls.static import static
from production.views import ProductionInvoicePdfView, ProductionListView
from inventory.views import InventoryInvoicePdfView, ProductListView
from sales.views import SaleInvoicePdfView

urlpatterns = [
    path('admin/', admin.site.urls, name='admin:index'),
    path('home/', views.home, name='home'),   
    path('ventas/', views.ventas, name='ventas'),
    path('rrhh/', views.rrhh, name='rrhh'),
    path('Postulacion/', views.Postulacion, name='Postulacion'),
    path('sugerencias/', views.sugerencias, name='sugerencias'),    
    path('insumo/', views.insumo, name='insumo'),
    path('sales/', views.sales, name='sales'),
    path('register/', views.register, name='register'),
    path('login/', views.login_view, name='login_jas'),
    path('logout/', views.logout_view, name='logout'),
    path('', views.index, name='index'),          
       
   
    path('sales/sale_invoice/', SaleInvoicePdfView.as_view(), name='sale_invoice_pdf'),
    
    path('producto/', ProductListView.as_view(), name='producto'),
     path('inventory/inventory_invoice/', InventoryInvoicePdfView.as_view(), name='inventory_invoice_pdf'),   
    
    path('ordenpedido/', ProductionListView.as_view(), name='ordenpedido'),
    path('production/product_invoice/', ProductionInvoicePdfView.as_view(), name='production_invoice_pdf'),
    #path('production/editar/<int:pk>/', editar_orden_pedido, name='editar_orden_pedido'),
    #path('production/eliminar/<int:pk>/', eliminar_orden_pedido, name='eliminar_orden_pedido'),
]

if settings.DEBUG:
      urlpatterns += static(settings.MEDIA_URL, document_root=settings.MEDIA_ROOT)
      
      