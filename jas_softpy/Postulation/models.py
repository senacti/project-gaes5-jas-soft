from django.db import models
from datetime import datetime

class position (models.Model):
    descrip_position = models.CharField(max_length=250, verbose_name="Descripción del cargo")

    def __str__(self):
        return self.descrip_position
    
    class Meta:
        verbose_name = "Cargo"
        verbose_name_plural = "Cargos"
        db_table = "cargo"
        ordering = ['id']

class Employed(models.Model):

    name = models.CharField(max_length=250, verbose_name="Nombre")

    position = models.ForeignKey(position,on_delete=models.CASCADE)

    def __str__(self):
        return self.name
    
    class Meta:
        verbose_name = "Empleado"
        verbose_name_plural = "Empleados"
        db_table = "empleado"
        ordering = ['id']

class Details_Offer(models.Model):

    salary = models.IntegerField(verbose_name="Salario")
    funtions = models.CharField(max_length=250, verbose_name="Funciones")


    def __str__(self):
        return self.salary
    
    class Meta:
        verbose_name = "Detalle de Oferta"
        verbose_name_plural = "Detalles de Ofertas"
        db_table = "descripoferta"
        ordering = ['id']

class State_Postulations(models.Model):

    Descrip_State = models.CharField(max_length=250, verbose_name="Descripción Postulación")

    def __str__(self):
        return self.Descrip_State
    
    class Meta:
        verbose_name = "Estado Postulación"
        verbose_name_plural = "Estado Postulaciones"
        db_table = "estadopostulaciones"
        ordering = ['id'] 

class Postulation(models.Model):
    start_offers = models.DateTimeField(verbose_name="Fecha de la oferta")
    descrip_offer = models.CharField(max_length=250, verbose_name="Descripción de la Oferta")
    profile_postulation = models.CharField(max_length=250, verbose_name="Perfil postulación")
    
    Employed = models.ForeignKey(Employed,on_delete=models.CASCADE)
    Details_Offer = models.ForeignKey(Details_Offer,on_delete=models.CASCADE)
    State_Postulations = models.ForeignKey(State_Postulations,on_delete=models.CASCADE)

    def __str__(self):
        return self.start_offers
    
    class Meta:
        verbose_name = "Postulación"
        verbose_name_plural = "Postulaciones"
        db_table = "postulacion"
        ordering = ['id']

class Scheduling(models.Model):

    date_interview= models.DateTimeField(verbose_name="Fecha de la entrevista agendamiento")

    postulation = models.ForeignKey(Postulation, on_delete=models.CASCADE)

    def __str__(self):
        return str(self.date_interview)
    
    class Meta:
        verbose_name = "Agendamiento"
        verbose_name_plural = "Agentamientos"
        db_table = "agendamiento"
        ordering = ['id']
        
class TypeContract(models.Model):

    descrip_contract = models.CharField(max_length=250, verbose_name="Descripción del Contrato")
    
    def __str__(self):
        return self.descrip_contract
    
    class Meta:
        verbose_name = "Tipo de Contrato"
        verbose_name_plural = "Tipos de Contratos"
        db_table = "tipocontrato"
        ordering = ['id']

class Contract(models.Model):

    contract_date = models.DateField(verbose_name="Fecha del Contrato")
    
    TypeContract = models.ForeignKey(TypeContract, on_delete=models.CASCADE)
    Employed = models.ForeignKey(Employed, on_delete=models.CASCADE)

    def __str__(self):
        return self.contract_date
    
    class Meta:
        verbose_name = "Contrato"
        verbose_name_plural = "Contratos"
        db_table = "contrato"
        ordering = ['id']



