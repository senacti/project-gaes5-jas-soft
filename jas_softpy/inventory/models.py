from django.db import models
from datetime import datetime

class Product(models.Model):
    name = models.CharField(max_length=50, verbose_name="Nombre")   
    stock = models.IntegerField(verbose_name="Cantidad")
    fabricationDate = models.DateTimeField(verbose_name="Fecha de fabricacion")
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