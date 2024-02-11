from django.contrib import admin
from .models import Product
from .models import Flow
from import_export import resources
from import_export.admin import ImportExportModelAdmin
from django.utils.html import format_html

#admin.site.register(Supplies)
#admin.site.register(ProductionOrder)

@admin.register(Product)
class ProductAdmin(ImportExportModelAdmin):
    change_list_template = "admin/custom_change_list.html"

    list_display = ('name', 'stock','fabricationDate','size','color','state',)
    search_fields = ('name',)
    list_editable = ('stock',)
    list_filter = ('fabricationDate',)

    def changelist_view(self, request, extra_context=None):
        extra_context = extra_context or {}
        extra_context['custom_button'] = format_html('<a class="button" href="{}">Reporte pdf</a>', '/inventory/inventory_invoice/')
        return super().changelist_view(request, extra_context=extra_context)
    
@admin.register(Flow)
class FlowAdmin(ImportExportModelAdmin):
    list_display = ('FlowType','DateFlow','Product','supplies')    
    search_fields = ('FlowType',)
    list_filter = ('DateFlow',)

    def productCode(self, obj):
        if obj.Product:
            return obj.Product.productCode
        return None

    productCode.short_description = 'Código de Producto'

    def supplieCode(self, obj):
        if obj.Supplies:
            return obj.Supplies.supplieCode
        return None

    supplieCode.short_description = 'Código de Producto'
    



class  ProductResource(resources.ModelResource):
    class Meta:
        model = Product
        fields = ('name', 'stock','fabricationDate','size','color','state','productCode')
        #export_order = ('name
        # ', 'price', 'category')    
        
    
