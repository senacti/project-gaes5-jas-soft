from django.db import models
from datetime import datetime


class Supplies(models.Model):
    name = models.CharField(max_length=50, verbose_name="Nombre") 
    stock = models.IntegerField(verbose_name="Cantidad")    
    size = models.CharField(max_length=12, verbose_name="Tamaño")
    color = models.CharField(max_length=20, verbose_name="Color")
    
    def __str__(self):
        return self.name
    
    class Meta:
        verbose_name = "Insumo"
        verbose_name_plural = "Insumos"
        db_table = "insumo"
        ordering = ['id']
        
class ProductionOrder(models.Model):   
    
    Production_OrderDate = models.DateTimeField(auto_now_add=True,verbose_name="Fecha pedido produccion")  
    supplies = models.ForeignKey(Supplies,on_delete=models.CASCADE)
    
    def __str__(self):
        return str(self.Production_OrderDate)
    
    class Meta:
        verbose_name = "Orden producion"
        verbose_name_plural = "ordenproduciones"
        db_table = "ordenproduccion"
        ordering = ['id']