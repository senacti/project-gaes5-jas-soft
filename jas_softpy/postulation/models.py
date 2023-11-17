from django.db import models
from datetime import datetime


class Employed(models.Model):

    name = models.CharField(max_length=250, verbose_name="Nombre")
    position = models.CharField(max_length=55, verbose_name="Cargo")

    def __str__(self):
        return self.name
    
    class Meta:
        verbose_name = "Empleado"
        verbose_name_plural = "Empleados"
        db_table = "empleado"
        ordering = ['id']

class Postulation(models.Model):
    startOffers = models.DateTimeField(verbose_name="Fecha de la oferta")
    descripOffer = models.TextField(max_length=250, verbose_name="Descripción de la Oferta")
    profilePostulation = models.CharField(max_length=250, verbose_name="Perfil postulación")
    StatePostulations = models.CharField(max_length=50, verbose_name="Estado Postulaciones")  
   
    def __str__(self):
        return self.descripOffer
    
    class Meta:
        verbose_name = "Postulación"
        verbose_name_plural = "Postulaciones"
        db_table = "postulacion"
        ordering = ['id']

class Scheduling(models.Model):

    dateInterview= models.DateTimeField(verbose_name="Fecha de la entrevista agendamiento")
    postulation = models.ForeignKey(Postulation, on_delete=models.CASCADE)

    def __str__(self):
        return str(self.dateInterview)
    
    class Meta:
        verbose_name = "Agendamiento"
        verbose_name_plural = "Agentamientos"
        db_table = "agendamiento"
        ordering = ['id']
        
class Contract(models.Model):

    contractdate = models.DateField(verbose_name="Fecha del Contrato")
    TypeContract = models.CharField(max_length=50, verbose_name="Tipo de Contrato")

    Employed = models.ForeignKey(Employed, on_delete=models.CASCADE, verbose_name="Empleado")

    def __str__(self):
        return self.TypeContract
    
    class Meta:
        verbose_name = "Contrato"
        verbose_name_plural = "Contratos"
        db_table = "contrato"
        ordering = ['id']


