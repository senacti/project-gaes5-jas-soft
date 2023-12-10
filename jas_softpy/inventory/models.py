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

    def __str__(self):
        return self.name
    
    class Meta:
        verbose_name = "Producto"
        verbose_name_plural = "Productos"
        db_table = "producto"
        ordering = ['id']

class Flow(models.Model):    
    FlowType = models.CharField(max_length=15, verbose_name="Tipo de flujo")
    DateFlow = models.DateTimeField(default=datetime.now,verbose_name="Fecha de flujo")
    Product = models.ForeignKey(Product, on_delete=models.CASCADE)
    supplies = models.ForeignKey(Supplies, on_delete=models.CASCADE)
    
    def __str__(self):
        return self.FlowType
    
    class Meta:
        verbose_name = "Flujo"
        verbose_name_plural = "Flujos"
        db_table = "flujo"
        ordering = ['id']
