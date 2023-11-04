from django.contrib import admin
from .models import Supplies,ProductionOrder

#admin.site.register(Supplies)
#admin.site.register(ProductionOrder)

@admin.register(Supplies)
class SupplieAdmin(admin.ModelAdmin):
    list_display = ('name', 'stock','size','color',)
    search_fields = ('name',)
    list_editable = ('stock',)
    list_filter = ('size',)
    
@admin.register(ProductionOrder)
class ProductionOrderAdmin(admin.ModelAdmin):
    list_display = ('Production_OrderDate', 'supplies',)
    #list_display_links = ('name')
    
    
    