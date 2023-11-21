from django.contrib import admin
from .models import Supplies,ProductionOrder
from import_export import resources
from import_export.admin import ImportExportModelAdmin

#admin.site.register(Supplies)
#admin.site.register(ProductionOrder)

@admin.register(Supplies)
class SupplieAdmin(ImportExportModelAdmin):
    list_display = ('name', 'stock','size','color',)
    search_fields = ('name',)
    list_editable = ('stock',)
    list_filter = ('size',)

class SupplieResource(resources.ModelResource):
    class Meta:
        model = Supplies
        fields = ('name', 'stock','size','color')
        #export_order = ('name', 'price', 'category')
    
@admin.register(ProductionOrder)
class ProductionOrderAdmin(ImportExportModelAdmin):
    list_display = ('Production_OrderDate', 'supplies',)
    #list_display_links = ('name')
    
class ProductionOrderResource(resources.ModelResource):
    class Meta:
        model = ProductionOrder
        fields = ('Production_OrderDate', 'supplies')
        #export_order = ('name', 'price', 'category')    
    