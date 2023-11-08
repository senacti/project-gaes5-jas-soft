# Create your models here.

from itertools import product
from django.db import models
from datetime import datetime


class Pays(models.Model):
    
    payAmount = models.FloatField(verbose_name="Valor Pago")
    payMetod = models.CharField(max_length=50, verbose_name="Medio Pago")
    payTipe = models.CharField(max_length=50, verbose_name="Tipo pago")
    
    
    PurchaseOrder = models.ForeignKey(PurchaseOrder,on_delete=models.CASCADE)
    
    
    def __str__(self):
        return self.name
    
    class Meta:
        verbose_name = "Pago"
        verbose_name_plural = "Pagos"
        db_table = "pagos"
        ordering = ['id']

class Client(models.Model):
    
    def __str__(self):
        return self.name
    
    class Meta:
        verbose_name = "Cliente"
        verbose_name_plural = "Clientes"
        db_table = "cliente"
        ordering = ['id']
        
class PurchaseOrder(models.Model):   
    
    StockProduct = models.IntegerField(verbose_name="Cantidad Producto")
    PurchaseOrderDate = models.DateTimeField(default=datetime.now,verbose_name="Fecha pedido")
    State = models.CharField(max_length=50, verbose_name="Estado Pedido") 
    
    
    Product = models.ForeignKey(product,on_delete=models.CASCADE)
    
    
    def __str__(self):
        return self.name
    
    class Meta:
        verbose_name = "Orden pedido"
        verbose_name_plural = "ordenpedidos"
        db_table = "ordenpedido"
        ordering = ['id']
        
class Sales(models.Model):   
    
    SaleDate = models.DateTimeField(default=datetime.now,verbose_name="Fecha Venta")
    SaleAmount = models.FloatField(verbose_name="Valor Venta")
    SaleSubAmount = models.FloatField(verbose_name="Valor Subtotal")
    SaleDisAmount = models.FloatField(verbose_name="Valor Descuento")
    SaleIvaAmount = models.FloatField(verbose_name="Valor IVA")
    
    
    Employed = models.ForeignKey(Employed,on_delete=models.CASCADE)  
    Client = models.ForeignKey(Client,on_delete=models.CASCADE)  
    Pays = models.ForeignKey(Pays,on_delete=models.CASCADE)  
    PurchaseOrder = models.ForeignKey(PurchaseOrder,on_delete=models.CASCADE)
    
    def __str__(self):
        return self.name
    
    class Meta:
        verbose_name = "Venta"
        verbose_name_plural = "Ventas"
        db_table = "ventas"
        ordering = ['id']
        