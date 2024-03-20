from django.db import models
from datetime import datetime, timedelta


class Employed(models.Model):

    name = models.CharField(max_length=250, verbose_name="Nombre")
    
    POSITION_CHOICES = [
        ('Administrador', 'Administrador'),
        ('JefeDeVentas', 'Jefe de ventas'),
        ('JefeDeProduccion', 'Jefe de produccion'),
        ('Secretaria', 'Secretaria'),
    ]

    position = models.CharField(max_length=55, choices=POSITION_CHOICES, verbose_name="Cargo")

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
   
    STATEPOSTULATIONS_CHOICES = [
        ('Activa', 'Activa'),
        ('EnRevision', 'En Revisión'),
        ('Seleccionado', 'Seleccionado'),
        ('Declinada', 'Declinada'),
    ]

    StatePostulations = models.CharField(max_length=50, choices=STATEPOSTULATIONS_CHOICES, verbose_name="Estado de Postulaciones")

    def __str__(self):
        return self.descripOffer

    def endOffers(self):
        return self.startOffers + timedelta(days=7)
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

    TYPECONTRACT_CHOICES = [
        ('TerminoFijo', 'Término Fijo'),
        ('Indefinido', 'Indefinido'),
        ('ObraoLabor', 'Obra o labor'),
        ('Temporal', 'Temporal'),
    ]

    TypeContract = models.CharField(max_length=50, choices=TYPECONTRACT_CHOICES, verbose_name="Tipo de Contrato")

    Employed = models.ForeignKey(Employed, on_delete=models.CASCADE, verbose_name="Empleado")

    def __str__(self):
        return self.TypeContract
    
    class Meta:
        verbose_name = "Contrato"
        verbose_name_plural = "Contratos"
        db_table = "contrato"
        ordering = ['id']


