# Create your models here.

from itertools import product
from django.db import models
from datetime import datetime
from inventory.models import Product
from postulation.models import Employed


class PurchaseOrder(models.Model):   
    
    stockProduct = models.IntegerField(verbose_name="Cantidad Producto")
    purchaseOrderDate = models.DateTimeField(default=datetime.now,verbose_name="Fecha pedido")
    
    STATE_CHOICES = [
        ('Recibido', 'Recibido'),
        ('En Produccion', 'En producción'),
        ('En Camino', 'En camino'),
        ('Finalizado', 'Finalizado'),
    ]
    
    state = models.CharField(max_length=50, choices=STATE_CHOICES, verbose_name="Estado Pedido")     
    product = models.ForeignKey(Product,on_delete=models.CASCADE)
    
    
    def __str__(self):
        return f"{self.state} - {self.product}"
    
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
    purchaseOrder = models.ForeignKey(PurchaseOrder, on_delete=models.CASCADE)
    
    def __str__(self):
        return self.payTipe

    class Meta:
        verbose_name = "Pago"
        verbose_name_plural = "Pagos"
        db_table = "pagos"
        ordering = ['id']

class Sales(models.Model):   
    saleDate = models.DateTimeField(default=datetime.now, verbose_name="Fecha Venta")    
    saleAmount = models.FloatField(verbose_name="Valor Venta")
    saleSubAmount = models.FloatField(verbose_name="Valor Subtotal")
    
    IVA_CHOICES = [
        (0, '0%'),
        (5, '5%'),
        (10, '10%'),
        (19, '19%'),
    ]
    
    saleIvaAmount = models.IntegerField(choices=IVA_CHOICES, verbose_name="Valor IVA")   
    employed = models.ForeignKey(Employed, on_delete=models.CASCADE, verbose_name="Empleado")   
    pays = models.ForeignKey(Pays, on_delete=models.CASCADE, verbose_name="Pago")  
    purchaseOrder = models.ForeignKey(PurchaseOrder, on_delete=models.CASCADE, verbose_name="Orden de pedido")
    
    def calculate_total(self):
        iva_percentage = self.saleIvaAmount / 100.0
        iva_amount = self.saleSubAmount * iva_percentage
        total = self.saleSubAmount + iva_amount
        return total
    
    def __str__(self):
        return str(self.saleAmount)
    
    class Meta:
        verbose_name = "Venta"
        verbose_name_plural = "Ventas"
        db_table = "ventas"
        ordering = ['id']