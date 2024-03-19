import datetime
import uuid
from django.utils import timezone
from carts.models import Cart
from users.models import User
from shipping_addresses.models import ShippingAddress
from django.db.models.signals import pre_save
from django.db import models



from enum import Enum

class OrderStatus(Enum):
    CREATED = 'CREATED'
    PAYED = 'PAYED'
    COMPLETED = 'COMPLETED'
    CANCELED = 'CANCELED'

choices = [(tag, tag.value) for tag in OrderStatus]

class Order(models.Model):
    order_id = models.CharField(max_length=100, null=False, blank=False, unique=True)
    user = models.ForeignKey(User, on_delete=models.CASCADE)
    cart = models.ForeignKey(Cart, on_delete=models.CASCADE)
    status = models.CharField(max_length=50, choices=choices, default=OrderStatus.CREATED)
    
    shipping_total = models.DecimalField(default=5, max_digits=8, decimal_places=2)
    total = models.DecimalField(default=0, max_digits=8, decimal_places=2)
    created_at = models.DateTimeField(auto_now_add=True)
    shipping_address = models.ForeignKey(ShippingAddress, 
                                         null=True, blank=True, 
                                         on_delete=models.CASCADE)

    def __str__(self):
        return self.order_id
    
    def get_or_set_shipping_address(self):
        if self.shipping_address:
            return self.shipping_address
        
        shipping_address = self.user.shipping_address
        if shipping_address:
            self.shipping_address  = shipping_address
            self.save()
            
        return shipping_address
    
    def update_total(self):
        self.total = self.get_total()
        self.save()
    
    def get_total(self):
        return self.cart.total + self.shipping_total
    
def set_order_id(sender, instance, *args, **kwargs):
        if not instance.order_id:
            instance.order_id = str(uuid.uuid4())

def set_total(sender, instance, *args, **kwargs):
        instance.total = instance.get_total()

pre_save.connect(set_order_id, sender=Order)
pre_save.connect(set_total, sender=Order)



class PurchaseOrder(models.Model):   
    stockProduct = models.IntegerField(verbose_name="Cantidad Producto")
    purchaseOrderDate = models.DateTimeField(default=timezone.now, verbose_name="Fecha pedido")
    STATE_CHOICES = [
        ('Recibido', 'Recibido'),
        ('En Produccion', 'En producción'),
        ('En Camino', 'En camino'),
        ('Finalizado', 'Finalizado'),
    ]
    
    product = models.ForeignKey('inventory.Product', on_delete=models.CASCADE)
    state = models.CharField(max_length=50, choices=STATE_CHOICES, verbose_name="Estado Pedido")  

    def __str__(self):
        return f"{self.state} - {self.product}"

    class Meta:
        verbose_name = "Orden pedido"
        verbose_name_plural = "ordenpedidos"
        
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
        return f"{self.payTipe} - {self.purchaseOrder}"
    
    ordering = ['id']

class Sales(models.Model):   
    saleDate = models.DateTimeField(default=timezone.now, verbose_name="Fecha Venta")   
    saleAmount = models.FloatField(verbose_name="Valor Venta")
    saleSubAmount = models.FloatField(verbose_name="Valor Subtotal")
    
    IVA_CHOICES = [
        (0, '0%'),
        (5, '5%'),
        (10, '10%'),
        (19, '19%'),
    ]
    
    saleIvaAmount = models.IntegerField(choices=IVA_CHOICES, verbose_name="Valor IVA")   
    saleDiscountPercentage = models.FloatField(default=0.0, verbose_name="Porcentaje de Descuento", help_text="Descuento en porcentaje de subtotal")
    employed = models.ForeignKey('postulation.Employed', on_delete=models.CASCADE, verbose_name="Empleado")   
    pays = models.ForeignKey(Pays, on_delete=models.CASCADE, verbose_name="Pago")  
    purchaseOrder = models.ForeignKey(PurchaseOrder, on_delete=models.CASCADE, verbose_name="Orden de pedido")
    

    @property
    def total(self):
        subtotal = self.saleSubAmount - self.discountAmount
        iva_percentage = self.saleIvaAmount / 100.0
        iva_amount = subtotal * iva_percentage
        total = subtotal + iva_amount
        return total

    
    def __str__(self):
        return str(self.saleAmount)
    
    class Meta:
        verbose_name = "Venta"
        verbose_name_plural = "Ventas"
        db_table = "ventas"
        
        ordering = ['id']
        
class Employed(models.Model):
    name = models.CharField(max_length=100, verbose_name="Nombre")
    position = models.CharField(max_length=100, verbose_name="Cargo")

    def __str__(self):
        return self.name

    class Meta:
        verbose_name = "Empleado"
        verbose_name_plural = "Empleados"
        db_table = "empleados"
