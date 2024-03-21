
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
    list_display = ('get_production_order_date', 'display_supplies','get_stock','productionOrderCode')
    list_filter = ()
    inlines = [SupplieProductionInline]
    
    def productionOrderCode(self, obj):
        return obj.supplieProductionCode
    productionOrderCode.short_description = 'Código de Producto'


    
    def get_production_order_date(self, obj):
        productionorder_date = obj.supplieproduction_set.first()  
        return productionorder_date.Production_OrderDate if productionorder_date else None

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

    def display_supplies(self, instance):
        supplie_productions = instance.supplieproduction_set.all()
        return ", ".join([f"{supply.supplies.name} - {supply.supplies.supplieCode}" for supply in supplie_productions])

    class Meta:
        model = ProductionOrder
        fields = ('production_order_date', 'display_supplies', 'get_stock', 'productionOrderCode')

    def dehydrate_productionOrderCode(self, instance):
        return instance.supplieProductionCode

    def dehydrate_get_stock(self, instance):
        productionorder_stoc = instance.supplieproduction_set.all()
        return ", ".join([f"{productorder.quantity}" for productorder in productionorder_stoc])

    def dehydrate_display_supplies(self, instance):
        supplie_productions = instance.supplieproduction_set.all()
        return ", ".join([f"{supply.supplies.name} - {supply.supplies.supplieCode}" for supply in supplie_productions])