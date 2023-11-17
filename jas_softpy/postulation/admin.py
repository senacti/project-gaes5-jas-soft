from django.contrib import admin
from .models import Postulation,Employed,Contract

@admin.register(Postulation)
class PostulationAdmin(admin.ModelAdmin):
    list_display = ('startOffers', 'descripOffer','profilePostulation','StatePostulations',)
    search_fields = ('descripOffer',)
    list_editable = ()
    list_filter = ('startOffers',)

@admin.register(Contract)
class ContractAdmin(admin.ModelAdmin):
    list_display = ('contractdate', 'TypeContract',)
    search_fields = ('TypeContract',)
    list_editable = ()  
    list_filter = ('TypeContract',) 

@admin.register(Employed)
class EmployedAdmin(admin.ModelAdmin):
    list_display = ('name', 'position',)
    #list_display_links = ('name')

    