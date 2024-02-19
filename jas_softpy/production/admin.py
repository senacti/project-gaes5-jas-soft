
from django.contrib import admin
from .models import Supplies, ProductionOrder, SupplieProduction
from import_export import resources, fields
from import_export.admin import ImportExportModelAdmin
from django.urls import reverse
from django.utils.html import format_html

#admin.site.register(Supplies)
#admin.site.register(ProductionOrder)

@admin.register(Supplies)
class SupplieAdmin(ImportExportModelAdmin):
    change_list_template = "admin/custom_change_list.html"
    
    list_display = ('name', 'stock','size','color','supplieCode')
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
        fields = ('name', 'stock','size','color','supplieCode')
        #export_order = ('name', 'price', 'category')
        
class SupplieProductionInline(admin.TabularInline):
    model = SupplieProduction
    extra = 1
    
@admin.register(ProductionOrder)
class ProductionOrderAdmin(ImportExportModelAdmin):
    list_display = ('get_production_order_date', 'display_supplies','get_stock')
    list_filter = ()
    inlines = [SupplieProductionInline]

    def get_production_order_date(self, obj):
        productionorder_date = obj.supplieproduction_set.all()
        return ", ".join([f"{productorder.Production_OrderDate}" for productorder in productionorder_date])

    get_production_order_date.short_description = 'Fecha orden de produccion'
    
    def get_stock(self, obj):
        productionorder_stoc = obj.supplieproduction_set.all()
        return ", ".join([f"{productorder.quantity}" for productorder in productionorder_stoc])
        

    get_stock.short_description = 'Cantidad'
    
    def display_supplies(self, obj):
        supplie_productions = obj.supplieproduction_set.all()
        return ", ".join([f"{supply.supplies.name} - {supply.supplies.supplieCode}" for supply in supplie_productions])

    display_supplies.short_description = 'Insumos'

   
class ProductionOrderResource(resources.ModelResource):
    production_order_date = fields.Field(
        column_name='Production_OrderDate',
        attribute='supplieproduction__Production_OrderDate'
    )

    class Meta:
        model = ProductionOrder
        fields = ('production_order_date', 'supplies', 'quantity_used',)
    