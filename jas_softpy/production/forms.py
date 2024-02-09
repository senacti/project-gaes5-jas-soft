from django import forms
from .models import ProductionOrder

class CreateProductionOrderForm(forms.ModelForm):
    
    stock = forms.IntegerField(required=True, widget=forms.NumberInput(attrs={'class': 'form-control'}))
    supplies = forms.CharField(required=True, widget=forms.CharField(required=True, min_length=4, max_length=50, widget=forms.TextInput(attrs={'class': 'form-control'})))                              


    class Meta:
        model = ProductionOrder
        fields = ['stock', 'supplies']

    def save(self, commit=True):
        production_order = super(CreateProductionOrderForm, self).save(commit=False)
        production_order.stock = self.cleaned_data['stock']
        production_order.supplies = self.cleaned_data['supplies']

        if commit:
            production_order.save()

        return production_order
