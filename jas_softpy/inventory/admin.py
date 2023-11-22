from django.contrib import admin
from .models import Product
from .models import Flow
from import_export import resources
from import_export.admin import ImportExportModelAdmin

#admin.site.register(Supplies)
#admin.site.register(ProductionOrder)

@admin.register(Product)
class ProductAdmin(ImportExportModelAdmin):
    list_display = ('name', 'stock','fabricationDate','size','color','state',)
    search_fields = ('name',)
    list_editable = ('stock',)
    list_filter = ('fabricationDate',)
    
@admin.register(Flow)
class FlowAdmin(ImportExportModelAdmin):
    list_display = ('FlowType','DateFlow','Product','supplies')    
    search_fields = ('FlowType',)
    list_filter = ('DateFlow',)

# Register your models here.

class  ProductResource(resources.ModelResource):
    class Meta:
        model = Product
        fields = ('name', 'stock','fabricationDate','size','color','state',)
        #export_order = ('name
        # ', 'price', 'category')    
        
    
