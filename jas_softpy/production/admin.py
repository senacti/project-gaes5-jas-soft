from django.contrib import admin
from .models import Supplies,ProductionOrder
from import_export import resources
from import_export.admin import ImportExportModelAdmin
from django.urls import reverse
from django.utils.html import format_html

#admin.site.register(Supplies)
#admin.site.register(ProductionOrder)

@admin.register(Supplies)
class SupplieAdmin(ImportExportModelAdmin):
    change_list_template = "admin/custom_change_list.html"
    
    list_display = ('name', 'stock','size','color',)
    search_fields = ('name',)
    list_editable = ('stock',)
    list_filter = ('size',)
    
    def changelist_view(self, request, extra_context=None):
        extra_context = extra_context or {}
        extra_context['custom_button'] = format_html('<a class="button" href="{}">Reporte pdf</a>', '/production/product_invoice/')
        return super().changelist_view(request, extra_context=extra_context)

class SupplieResource(resources.ModelResource):
    class Meta:
        model = Supplies
        fields = ('name', 'stock','size','color',)
        #export_order = ('name', 'price', 'category')
    
@admin.register(ProductionOrder)
class ProductionOrderAdmin(ImportExportModelAdmin):
    list_display = ('Production_OrderDate', 'supplies', 'quantity_used',)
    list_filter = ('Production_OrderDate',)
    #list_display_links = ('name')
    
class ProductionOrderResource(resources.ModelResource):
    class Meta:
        model = ProductionOrder
        fields = ('Production_OrderDate', 'supplies', 'quantity_used',)
        #export_order = ('name', 'price', 'category')    
    