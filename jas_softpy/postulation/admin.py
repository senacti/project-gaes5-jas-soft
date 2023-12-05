from django.contrib import admin
from .models import Postulation,Employed,Contract
from import_export import resources
from import_export.admin import ImportExportModelAdmin

@admin.register(Postulation)
class PostulationAdmin(ImportExportModelAdmin):
    list_display = ('startOffers', 'descripOffer','profilePostulation','StatePostulations',)
    search_fields = ('profilePostulation',)
    list_editable = ()
    list_filter = ('startOffers',)

class PostulationResource(resources.ModelResource):
    class Meta:
        model = Postulation
        fields = ('startOffers', 'descripOffer','StatePostulations','profilePostulation')
        #export_order = ('startOffers', 'descripOffer', 'profilePostulation')

@admin.register(Contract)
class ContractAdmin(ImportExportModelAdmin):
    list_display = ('contractdate', 'TypeContract',)
    search_fields = ('TypeContract',)
    list_editable = ()  
    list_filter = ('TypeContract',) 
    
@admin.register(Employed)
class EmployedAdmin(ImportExportModelAdmin):
    list_display = ('name', 'position',)
    #list_display_links = ('name')

    