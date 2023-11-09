from django.db import models
from datetime import datetime

class Postulation(models.Model):
    position = models.CharField(max_length=55, verbose_name="Puesto")
    job_offers = models.IntegerField(verbose_name="Cantidad de Puestos")
    descrip_offers = models.CharField(max_length=250, verbose_name="Descripción del cargo")
    start_offers = models.DateTimeField(verbose_name="Fecha de publicación de la oferta")
    close_offers = models.DateTimeField(verbose_name="Fecha de Cierre de la oferta")
    experience = models.IntegerField(verbose_name="Experiencia Requerida")
    studies = models.CharField(max_length=250, verbose_name="Estudios")
    type_contract = models.CharField(max_length=25, verbose_name="Tipo de Contrato")

    def __str__(self):
        return self.position
    
    class Meta:
        verbose_name = "Postulación"
        verbose_name_plural = "Postulaciones"
        db_table = "postulacion"
        ordering = ['id']

class Employed(models.Model):

    name = models.CharField(max_length=255, verbose_name="Nombre")
    last_name = models.CharField(max_length=255, verbose_name="Apellido")
    document_number = models.CharField(max_length=20, verbose_name="Número de documento")
    email = models.EmailField(verbose_name="Correo electrónico")
    phone_number = models.CharField(max_length=20, verbose_name="Número de teléfono")
    gender = models.CharField(max_length=10, verbose_name="Género")

    def __str__(self):
        return self.name 
    
    class Meta:
        verbose_name = "Empleado"
        verbose_name_plural = "Empleados"
        db_table = "empleado"
        ordering = ['id']

class Scheduling(models.Model):

    date = models.DateTimeField(verbose_name="Fecha del Agendamiento")
    time = models.TimeField(verbose_name="Hora del Agendamiento")

    postulation = models.ForeignKey(Postulation, on_delete=models.CASCADE)
    interviewer = models.ForeignKey(Employed, on_delete=models.SET_NULL, null=True)

    def __str__(self):
        return f"{self.date} {self.time}"
    
    class Meta:
        verbose_name = "Agendamiento"
        verbose_name_plural = "Agentamientos"
        db_table = "agendamiento"
        ordering = ['id']

class Contract(models.Model):

    contract_type = models.CharField(max_length=20, verbose_name="Tipo de Contrato")
    start_date = models.DateField(verbose_name="Fecha de Inicio")
    end_date = models.DateField(verbose_name="Terminación de Contrato")
    salary = models.DecimalField(max_digits=10, decimal_places=2, verbose_name="Salario")
    position = models.CharField(max_length=255, verbose_name="Puesto")
    
    postulation = models.ForeignKey(Postulation, on_delete=models.CASCADE)
    Employed = models.ForeignKey(Employed, on_delete=models.CASCADE)

    def __str__(self):
        return f"{self.contract_type} {self.start_date}"
    
    class Meta:
        verbose_name = "Contrato"
        verbose_name_plural = "Contratos"
        db_table = "contrato"
        ordering = ['id']