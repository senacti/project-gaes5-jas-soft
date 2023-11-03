from django.db import models
from datetime import datetime

class Postulation(models.Model):
    position = models.CharField(max_length=55, verbose_name="Puesto")
    job_offers = models.IntegerField(max_length=15, verbose_name="Cantidad de Puestos")
    descrip_offers = models.CharField(max_length=250, verbose_name="Descripción del cargo")
    start_offers = models.DateTimeField(verbose_name="Fecha de publicación de la oferta")
    close_offers = models.DateTimeField(verbose_name="Fecha de Cierre de la oferta")
    experience = models.IntegerField(max_length=15, verbose_name="Experiencia Requerida")
    studies = models.CharField(max_length=250, verbose_name="Estudios")
    type_contract = models.CharField(max_length=25, verbose_name="Tipo de Contrato")

    def __str__(self):
        return self.position
    
    class Meta:
        verbose_name = "Postulación"
        verbose_name_plural = "Postulaciones"
        db_table = "postulacion"
        ordering = ['id']