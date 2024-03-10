

import json
from typing import Self
from django import forms
from django.db import models
from datetime import datetime
from django.dispatch import receiver
from django.db.models.signals import post_save

from django.forms import model_to_dict

class Supplies(models.Model):
    name = models.CharField(max_length=50, verbose_name="Nombre") 
    stock = models.PositiveSmallIntegerField(verbose_name="Cantidad")    
    size = models.CharField(max_length=12, verbose_name="Tamaño")
    color = models.CharField(max_length=20, verbose_name="Color")       

    supplieCode = models.CharField(max_length=20, null=True, blank=True, editable=False, verbose_name="Código")

    def save(self, *args, **kwargs):
        if not self.id:
            last_object = Supplies.objects.last()
            if last_object:
                self.supplieCode = str(last_object.supplieCode + 1)
            else:
                self.supplieCode = str(100001)
        super(Supplies, self).save(*args, **kwargs)            

    def __str__(self):
        return f"{self.name} - {self.supplieCode}"
    
    def decrease_stock(self, quantity):
        print(f"Before Decrease: Stock={self.stock}, Quantity={quantity}",'------------------------------------------------------------')
        if self.stock >= quantity:            
            self.stock -= quantity
            print(f"After Decrease: Stock={self.stock}")
            self.save()
        else:
            raise ValueError("La cantidad utilizada es mayor que el stock de insumos.")
    
    def toJSON(self):
        item = model_to_dict(self)
        item['name'] = self.name.toJSON()
        item['stock'] = self.stock
        item['size'] = self.size.toJSON()
        item['color'] = self.color.toJSON()
        item['det'] = [i.toJSON() for i in self.detsupplie_set.all()]
        return item   
        
    class Meta:
        verbose_name = "Insumo"
        verbose_name_plural = "Insumos"
        db_table = "insumo"
        ordering = ['id']

class ProductionOrder(models.Model):       
    supplies = models.ManyToManyField(Supplies, through='SupplieProduction',verbose_name="Insumos")
                
    def __str__(self):
        return str(self.id)
    
    class Meta:
        verbose_name = "Orden producción"
        verbose_name_plural = "ordenesproducciones"        
        db_table = "ordenproduccion"
        ordering = ['id']
        
class SupplieProduction(models.Model):        
    Production_OrderDate = models.DateField(auto_now_add=True, verbose_name="Orden de produccion")       
    quantity = models.IntegerField(default=1)
    production_order = models.ForeignKey(ProductionOrder, on_delete=models.CASCADE)
    supplies = models.ForeignKey(Supplies, on_delete=models.CASCADE)
    
    def __str__(self):
        return str(self.id)
    
    class Meta:
        verbose_name = "Insumo producción"
        verbose_name_plural = "insumosproducciones"        
        db_table = "insumoproduccion"
        ordering = ['id']

@receiver(post_save, sender=SupplieProduction)
def decrease_stock(sender, instance, **kwargs):

    supplies = instance.supplies
    quantity = instance.quantity

    try:
        supplies.decrease_stock(quantity)
    except ValueError as e:        
        print(e)     
    