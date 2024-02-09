from django import forms
from .models import ProductionOrder

class CreateProductionOrderForm(forms.Form):
    
    stock = forms.IntegerField(required=True, widget=forms.IntegerField)
    supplies = forms.CharField(required=True)
