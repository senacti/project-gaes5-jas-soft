

import json
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
    supplies = models.ManyToManyField(Supplies, through='SupplieProduction',verbose_name="Insumos")
                
    def __str__(self):
        return str(self.id)
    
    class Meta:
        verbose_name = "Orden producción"
        verbose_name_plural = "ordenesproducciones"        
        db_table = "ordenproduccion"
        ordering = ['id']
        
class SupplieProduction(models.Model):
    production_order = models.ForeignKey(ProductionOrder, on_delete=models.CASCADE)
    supplies = models.ForeignKey(Supplies, on_delete=models.CASCADE)
    Production_OrderDate = models.DateTimeField(auto_now_add=True, verbose_name="Orden de produccion")     
    quantity = models.IntegerField(default=1)
    
    def save(self, *args, **kwargs):
        print("Entro al método save de SupplieProduction --------------------------------------------------------")
        if not self.pk:
            total_quantity_used = SupplieProduction.objects.filter(production_order=self.production_order).aggregate(total_quantity=models.Sum('quantity'))['total_quantity'] or 0
            print(f"Total quantity used: {total_quantity_used}")
            print(f"Quantity to be used: {self.quantity}")
            print(f"Total supplies count: {self.production_order.supplies.count()}")
            print("Entro al if --------------------------------------------------------")
            if total_quantity_used + self.quantity <= self.production_order.supplies.count():
                print("Antes de decrease_stock")
                self.supplies.decrease_stock(self.quantity)
                print("Después de decrease_stock")
            else:
                raise ValueError(f"La cantidad utilizada ({total_quantity_used + self.quantity}) es mayor que la cantidad total en insumos ({self.production_order.supplies.count()}).")

        super().save(*args, **kwargs)