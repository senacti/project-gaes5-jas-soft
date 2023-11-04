from django.contrib import admin
from .models import Product

#admin.site.register(Supplies)
#admin.site.register(ProductionOrder)

@admin.register(Product)
class SupplieAdmin(admin.ModelAdmin):
    list_display = ('name', 'stock','fabricationDate','size','color','state',)
    search_fields = ('name',)
    list_editable = ('stock',)
    list_filter = ('fabricationDate',)
    

# Register your models here.
