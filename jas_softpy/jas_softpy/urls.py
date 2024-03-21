from django import views
from django.contrib import admin
from django.urls import path
from django.urls import include
from django.conf import settings
from django.conf.urls.static import static
from production.views import ProductionInvoicePdfView, ProductionListView, SuppliesListView
from inventory.views import InventoryInvoicePdfView, ProductListViewInventory, ProductListViewCatalogo
from sales.views import SaleInvoicePdfView,  SalesListView
from postulation.views import PostulationInvoicePdfView, PostulationListView, OfferListView
from suggestions.views import SuggestionsListView
from . import views
from django.contrib.auth import views as auth_views



urlpatterns = [
    path('orden/', include('sales.urls')),
    path('direcciones/', include('shipping_addresses.urls')),
    
    path('admin/', admin.site.urls, name='admin:index'),
    path('home/', views.home, name='home'),   
    path('rrhh/', views.rrhh, name='rrhh'),
    
    
    path('reset_password/', auth_views.PasswordResetView.as_view(template_name="password/password_reset.html"), name="reset_password"),
    path('reset_password_sent/', auth_views.PasswordResetDoneView.as_view(template_name="password/password_reset_sent.html"), name="password_reset_done"),   
    path('reset/<uidb64>/<token>/', auth_views.PasswordResetConfirmView.as_view(template_name="password/reset.html"), name="password_reset_confirm"),
    path('reset_password_complete/', auth_views.PasswordResetCompleteView.as_view(template_name="password/password_reset_done.html"), name="password_reset_complete"),      
    
    path('register/', views.register, name='register'),
    path('login/', views.login_view, name='login_jas'),
    path('logout/', views.logout_view, name='logout'),
    path('', views.index, name='index'),     

    path('sales/', views.sales, name='sales'),
    path('sales/sale_invoice/', SaleInvoicePdfView.as_view(), name='sale_invoice_pdf'),
    path('ventas/create_sales/', views.create_sales, name='create_purchaseorder'),
    path('ventas/editar/<int:id>', views.editsales, name='edit_sales'),
    path('ventas/editar/<int:id>', views.EditSales, name='update_sales'),    
    path('ventas/eliminar/<id>/', views.deletesales, name='deletesales'),

    path('ofertas/', OfferListView.as_view(), name='ofertas'),
    path('postulaciones/', include('postulation.urls')), 
    
    path('Postulacion/', PostulationListView.as_view(), name='Postulacion'),
    path('postulation/postulation_invoice/', PostulationInvoicePdfView.as_view(), name='postulation_invoice_pdf'),  
    path('postulation/create_postulation/', views.create_postulation, name='create_postulation'),
    path('postulation/edit/<int:id>', views.editpostulation, name = 'edit_postulation'),
    path('postulation/update/<int:id>/', views.EditPostulation, name='update_postulation'),
    path('postulation/delete_postulation/<id>', views.deletepostulation, name = 'delete_postulation'),

    path('producto/', ProductListViewInventory.as_view(), name='producto'),
    path('catalogo/', ProductListViewCatalogo.as_view(), name='catalogo'),
    path('product/', include('inventory.urls')),
    path('carrito/', include('carts.urls')),
    
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
    path('production/editar/<int:id>', views.edit_production_order, name='edit_production_order'),
    path('production/editar/<int:id>', views.editProductionOrder, name='update_production_order'),    
    path('production/eliminar/<id>/', views.deleteProductionOrder, name='delete_production_order'),
    
    path('correo/', views.correo, name='correo'),
    path('sugerencias/', SuggestionsListView.as_view(), name='sugerencias'),  
    path('sugerencias/create_sugerencias/', views.create_suggestion, name='create_sugerencias'),
    path('sugerencias/edit/<int:id>', views.editsuggestion, name = 'edit_sugerencias'),
    path('sugerencias/update/<int:id>/', views.EditSuggestion, name='update_sugerencias'),
    path('sugerencias/delete_sugerencias/<id>', views.deletesuggestion, name = 'delete_sugerencias'),
    
    # path('ventas/create_production_order/', views.create_purchaseorder, name='create_purchaseorder'),
    # path('ventas/editar/<int:id>', views.editpurchaseorder, name='editpurchaseorder'),
    # path('ventas/editar/<int:id>', views.Edit_PurchaseOrder, name='Edit_PurchaseOrder'),    
    # path('ventas/eliminar/<id>/', views.deletePurchaseOrder, name='deletePurchaseOrder'),
    
    path('ventas/', SalesListView.as_view(), name='ventas'),
   
  
    
    path('', views.custom_login_required, name='custom_login_required'),
]

if settings.DEBUG:
    urlpatterns += static(settings.MEDIA_URL, document_root=settings.MEDIA_ROOT)