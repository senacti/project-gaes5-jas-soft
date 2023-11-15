from turtle import position
from django.contrib import admin
from .models import Postulation,State_Postulations,Employed,Contract

@admin.register(Postulation)
class PostulationAdmin(admin.ModelAdmin):
    list_display = ('start_offers', 'descrip_offer','profile_postulation','Employed','Details_Offer','State_Postulations')
    search_fields = ('Employed',)
    list_editable = ()
    list_filter = ('SaleDate',)
