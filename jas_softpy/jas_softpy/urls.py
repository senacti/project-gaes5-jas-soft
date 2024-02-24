from django import views
from django.contrib import admin
from django.urls import path
from django.conf import settings
from django.conf.urls.static import static
from production.views import ProductionInvoicePdfView, ProductionListView, SuppliesListView
from inventory.views import InventoryInvoicePdfView, ProductListView
from sales.views import SaleInvoicePdfView
from . import views

urlpatterns = [
    path('admin/', admin.site.urls, name='admin:index'),
    path('home/', views.home, name='home'),   
    path('ventas/', views.ventas, name='ventas'),
    path('rrhh/', views.rrhh, name='rrhh'),
    path('sugerencias/', views.sugerencias, name='sugerencias'),        
    
    path('ofertas/', views.ofertas, name='ofertas'),
    path('register/', views.register, name='register'),
    path('login/', views.login_view, name='login_jas'),
    path('logout/', views.logout_view, name='logout'),
    path('', views.index, name='index'),     

    path('Postulacion/', views.postulacion, name='Postulacion'),  
    
    path('sales/', views.sales, name='sales'),
    path('sales/sale_invoice/', SaleInvoicePdfView.as_view(), name='sale_invoice_pdf'),    
   
    path('producto/', ProductListView.as_view(), name='producto'),
    path('inventory/inventory_invoice/', InventoryInvoicePdfView.as_view(), name='inventory_invoice_pdf'),   
    path('inventory/create_inventory/', views.createinventory, name = 'create_inventory'),
    path('inventory/edit/<int:id>', views.editinventory, name = 'edit_inventory'),
    path('inventory/update/<int:id>/', views.EditInventory, name='update_inventory'),
    path('inventory/delete_inventory/<id>', views.deleteinventory, name = 'delete_inventory'),
    
    path('insumo/', SuppliesListView.as_view() ,name='insumo'),
    path('supplies/create_supplies/', views.createsupplies, name='create_supplies'),
    path('supplies/edit/<int:id>/', views.editsupplies, name='edit_supplies'),
    path('supplies/update/<int:id>/', views.EditSupplies, name='update_supplies'),
    path('supplies/delete/<id>/', views.deleteSupplies, name='delete_supplies'),
    
    path('ordenpedido/', ProductionListView.as_view() ,name='ordenpedido'),
    path('production/product_invoice/', ProductionInvoicePdfView.as_view(), name='production_invoice_pdf'),
    path('production/create_production_order/', views.create_production_order, name='create_production_order'),
    path('production/editar/<id>', views.editProductionOrder, name='edit_production_order'),
    
    path('production/eliminar/<id>/', views.deleteProductionOrder, name='delete_production_order')
]

if settings.DEBUG:
    urlpatterns += static(settings.MEDIA_URL, document_root=settings.MEDIA_ROOT)
