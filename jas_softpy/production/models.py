

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
    supplies_Code = models.CharField(unique=True)
    
    def save(self, *args, **kwargs):
        if not self.supplies_Code:
    
            ultimo_codigo = Supplies.objects.order_by('-supplies_Code').first()

            if ultimo_codigo:
                        ultimo_numero = int(ultimo_codigo.supplies_Code[2:])
                        nuevo_numero = ultimo_numero + 1
                        nuevo_codigo = f'PO{str(nuevo_numero).zfill(5)}'
            else:                        
                        nuevo_codigo = 'SC00001'

            Self.supplies_Code = nuevo_codigo

        super().save(*args, **kwargs)    
    
    def __str__(self):
        return self.name
    
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
    production_OrderCode = models.CharField(max_length=100, unique=True)
    supplies = models.ForeignKey(Supplies, on_delete=models.CASCADE, verbose_name="Insumos")
    
    def save(self, *args, **kwargs):
        if not self.production_OrderCode:
    
            ultimo_codigo = ProductionOrder.objects.order_by('-production_OrderCode').first()

            if ultimo_codigo:
                        ultimo_numero = int(ultimo_codigo.production_OrderCode[2:])
                        nuevo_numero = ultimo_numero + 1
                        nuevo_codigo = f'PO{str(nuevo_numero).zfill(5)}'
            else:
                        # Si no hay registros existentes, comienza desde 1
                        nuevo_codigo = 'PO00001'

            Self.production_OrderCode = nuevo_codigo

        super().save(*args, **kwargs)    
        
    def save(self, *args, **kwargs):        
        if self.id is None:
            if self.quantity_used <= self.supplies.stock:
                self.supplies.stock -= self.quantity_used
                self.supplies.save()
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
        
