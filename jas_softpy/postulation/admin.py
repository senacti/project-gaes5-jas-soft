from django.contrib import admin
from .models import Postulation,Employed,Contract

@admin.register(Postulation)
class PostulationAdmin(admin.ModelAdmin):
    list_display = ('start_offers', 'descrip_offer','profile_postulation','Employed','State_Postulations')
    search_fields = ('Employed__nombre',)
    list_editable = ()
    list_filter = ('start_offers', 'State_Postulations')

@admin.register(Contract)
class ContractAdmin(admin.ModelAdmin):
    list_display = ('contract_date', 'Employed')
    search_fields = ('contract_date', 'Employed__nombre')
    list_editable = ()  
    list_filter = ('contract_date', ) 

@admin.register(Employed)
class EmployedAdmin(admin.ModelAdmin):
    list_display = ('name', 'position')
    #list_display_links = ('name')

    