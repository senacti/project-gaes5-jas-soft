from django.db import models
from datetime import datetime
from production.models import Supplies

class Product(models.Model):
    name = models.CharField(max_length=50, verbose_name="Nombre")   
    stock = models.IntegerField(verbose_name="Cantidad")
    fabricationDate = models.DateField(verbose_name="Fecha de fabricacion")
    size = models.CharField(max_length=12, verbose_name="Tamaño")
    color = models.CharField(max_length=20, verbose_name="Color")
    state = models.CharField(max_length=12, verbose_name="Estado")
    productCode = models.IntegerField(null=True, blank=True,editable=False, verbose_name="Código")

    def save(self, *args, **kwargs):
        if not self.id:
            last_object = Product.objects.last()
            if last_object:
                self.productCode = last_object.productCode + 1
            else:
                self.productCode = 200001
        super(Product, self).save(*args, **kwargs) 
    

    def __str__(self):
        return f"{self.name} - {self.productCode}"
    
    class Meta:
        verbose_name = "Producto"
        verbose_name_plural = "Productos"
        db_table = "producto"
        ordering = ['id']

class Flow(models.Model):    
    
    DateFlow = models.DateTimeField(auto_now_add=True,verbose_name="Fecha de flujo")
    FlowType_CHOICES = [
        ('Entrada', 'Entrada'),
        ('Salida', 'Salida'),        
    ]
    
    FlowType = models.CharField(max_length=50, choices=FlowType_CHOICES, verbose_name="Tipo de flujo") 
    Product = models.ForeignKey(Product, on_delete=models.CASCADE, blank=True, null=True)    
    supplies = models.ForeignKey(Supplies, on_delete=models.CASCADE, blank=True, null=True)
    
    def __str__(self):
        product_Code = self.Product.productCode if self.Product else None
        supplies_code = self.supplies.suppliesCode if self.supplies else None

        return f"{self.FlowType} - Producto: {product_Code}, Suministro: {supplies_code}"            
    
    class Meta:
        verbose_name = "Flujo"
        verbose_name_plural = "Flujos"
        db_table = "flujo"
        ordering = ['id']
