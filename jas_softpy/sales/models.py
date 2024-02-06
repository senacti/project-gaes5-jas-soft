# Create your models here.

from itertools import product
from django.db import models
from datetime import datetime
from inventory.models import Product
from postulation.models import Employed


class PurchaseOrder(models.Model):   
    
    StockProduct = models.IntegerField(verbose_name="Cantidad Producto")
    PurchaseOrderDate = models.DateTimeField(default=datetime.now,verbose_name="Fecha pedido")
    
    STATE_CHOICES = [
        ('Recibido', 'Recibido'),
        ('EnProduccion', 'En producción'),
        ('EnCamino', 'En camino'),
        ('Finalizado', 'Finalizado'),
    ]
    
    State = models.CharField(max_length=50, choices=STATE_CHOICES, verbose_name="Estado Pedido") 
    
    
    Product = models.ForeignKey(Product,on_delete=models.CASCADE)
    
    
    def __str__(self):
        return self.State
    
    class Meta:
        verbose_name = "Orden pedido"
        verbose_name_plural = "ordenpedidos"
        db_table = "ordenpedido"
        ordering = ['id']

class Pays(models.Model):
    payAmount = models.FloatField(verbose_name="Valor Pago")
    
    PAYTIPE_CHOICES = [
        ('Total', 'Total'),
        ('Parcial', 'Parcial'),
    ]

    PAYMETHOD_CHOICES = [
        ('Efectivo', 'Efectivo'),
        ('TarjetaDeCredito', 'Tarjeta de crédito'),
        ('TarjetaDebito', 'Tarjeta débito'),
    ]
    
    payTipe = models.CharField(max_length=50, choices=PAYTIPE_CHOICES, verbose_name="Tipo de Pago")
    payMethod = models.CharField(max_length=50, choices=PAYMETHOD_CHOICES, default='Efectivo', verbose_name="Metodo de Pago")
    
    PurchaseOrder = models.ForeignKey(PurchaseOrder, on_delete=models.CASCADE)
    
    def __str__(self):
        return self.payTipe

    class Meta:
        verbose_name = "Pago"
        verbose_name_plural = "Pagos"
        db_table = "pagos"
        ordering = ['id']

class Sales(models.Model):   
    SaleDate = models.DateTimeField(default=datetime.now,verbose_name="Fecha Venta")
    
    SaleAmount = models.FloatField(verbose_name="Valor Venta")
    SaleSubAmount = models.FloatField(verbose_name="Valor Subtotal")
    
    IVA_CHOICES = [
        (0, '0%'),
        (5, '5%'),
        (10, '10%'),
        (19, '19%'),
        
    ]
    
    SaleIvaAmount = models.IntegerField(choices=IVA_CHOICES, verbose_name="Valor IVA")
    
    
    Employed = models.ForeignKey(Employed,on_delete=models.CASCADE,verbose_name="Empleado")   
    Pays = models.ForeignKey(Pays,on_delete=models.CASCADE,verbose_name="Pago")  
    PurchaseOrder = models.ForeignKey(PurchaseOrder,on_delete=models.CASCADE,verbose_name="Orden de pedido")
    
    def __str__(self):
        return str(self.SaleAmount)
    
    class Meta:
        verbose_name = "Venta"
        verbose_name_plural = "Ventas"
        db_table = "ventas"
        ordering = ['id']
        