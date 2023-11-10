from django.contrib import admin

# Register your models here.

from .models import Sales
from .models import Pays
from .models import PurchaseOrder


@admin.register(Sales)
class SalesAdmin(admin.ModelAdmin):
    list_display = ('SaleDate', 'SaleAmount','SaleSubAmount','SaleDisAmount','SaleIvaAmount','Employed','Client','Pays','PurchaseOrder')
    search_fields = ('Employed',)
    list_editable = ()
    list_filter = ('SaleDate',)

@admin.register(Pays)
class PaysAdmin(admin.ModelAdmin):
    list_display = ('payAmount','payMetod','payTipe','PurchaseOrder')
    search_fields = ('payAmount',)
    list_editable = ()
    list_filter = ('payAmount',)

@admin.register(PurchaseOrder)
class PurchaseOrderAdmin(admin.ModelAdmin):
    list_display = ('StockProduct','PurchaseOrderDate','State','Product')
    search_fields = ('State',)
    list_editable = ()
    list_filter = ('State',)

