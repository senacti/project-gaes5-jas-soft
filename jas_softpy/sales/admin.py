from django.contrib import admin

# Register your models here.

from .models import Sales
from .models import Pays
from .models import PurchaseOrder
from import_export import resources
from import_export.admin import ImportExportModelAdmin
from .models import Order
from django.utils.html import format_html

admin.site.register(Order)

@admin.register(Sales)
class SalesAdmin(ImportExportModelAdmin):

    change_list_template = "admin/custom_change_list.html"

    list_display = ('saleDate', 'saleAmount','saleSubAmount','saleIvaAmount','employed','pays','purchaseOrder')
    search_fields = ('employed',)
    list_editable = ()
    list_filter = ('saleDate',)

    def changelist_view(self, request, extra_context=None):
        extra_context = extra_context or {}
        extra_context['custom_button'] = format_html('<a class="button" href="{}">Reporte pdf</a>', '/sales/sale_invoice/')
        return super().changelist_view(request, extra_context=extra_context)
    

@admin.register(Pays)
class PaysAdmin(admin.ModelAdmin):
    list_display = ('payAmount', 'payTipe', 'payMethod', 'purchaseOrder')
    search_fields = ('payAmount',)
    list_editable = ()
    list_filter = ('payAmount',)
