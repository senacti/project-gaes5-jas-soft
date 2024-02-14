

from typing import Self
from django import forms
from django.db import models
from datetime import datetime


from django.forms import model_to_dict



class Supplies(models.Model):
    name = models.CharField(max_length=50, verbose_name="Nombre") 
    stock = models.PositiveSmallIntegerField(verbose_name="Cantidad")    
    size = models.CharField(max_length=12, verbose_name="Tamaño")
    color = models.CharField(max_length=20, verbose_name="Color")       

    supplieCode = models.IntegerField(null=True, blank=True,editable=False, verbose_name="Código")

    def save(self, *args, **kwargs):
        if not self.id:
            last_object = Supplies.objects.last()
            if last_object:
                self.supplieCode = last_object.supplieCode + 1
            else:
                self.supplieCode = 100001
        super(Supplies, self).save(*args, **kwargs)     

    def __str__(self):
        return f"{self.name} - {self.supplieCode}"
    
    def toJSON(self):
        item = model_to_dict(self)
        item['name'] = self.name.toJSON()
        item['stock'] = format(self.stock, '.2f')
        item['size'] =  self.size.toJSON()
        item['color'] = self.color.toJSON()
        item['det'] = [i.toJSON() for i in self.detsupplie_set.all()]
        return item        
        
    class Meta:
        verbose_name = "Insumo"
        verbose_name_plural = "Insumos"
        db_table = "insumo"
        ordering = ['id']

class ProductionOrder(models.Model):   
    Production_OrderDate = models.DateTimeField(auto_now_add=True, verbose_name="Fecha pedido produccion") 
    quantity_used = models.PositiveIntegerField(verbose_name="Cantidad utilizada")    
    supplies = models.ManyToManyField(Supplies, verbose_name="Insumos")

    def save(self, *args, **kwargs):        
        if self.pk is None:
            total_quantity_used = sum(supply.stock for supply in self.supplies.all())
            if total_quantity_used <= self.quantity_used:
                for supply in self.supplies.all():
                    supply.stock -= self.quantity_used
                    supply.save()
            else:                
                raise ValueError("La cantidad utilizada es mayor que el stock de insumos.")
        super().save(*args, **kwargs)
    
    def __str__(self):
        return str(self.Production_OrderDate)
    
    class Meta:
        verbose_name = "Orden producción"
        verbose_name_plural = "ordenesproducciones"        
        db_table = "ordenproduccion"
        ordering = ['id']
        
