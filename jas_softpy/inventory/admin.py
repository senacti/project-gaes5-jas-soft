from django.contrib import admin
from .models import Product
from .models import Flow

#admin.site.register(Supplies)
#admin.site.register(ProductionOrder)

@admin.register(Product)
class SupplieAdmin(admin.ModelAdmin):
    list_display = ('name', 'stock','fabricationDate','size','color','state',)
    search_fields = ('name',)
    list_editable = ('stock',)
    list_filter = ('fabricationDate',)
    
@admin.register(Flow)
class FlowAdmin(admin.ModelAdmin):
    list_display = ('FlowType','DateFlow','Product','supplies')    
    search_fields = ('FlowType',)
    list_filter = ('DateFlow',)

# Register your models here.
