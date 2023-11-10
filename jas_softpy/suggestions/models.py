from django.db import models

# Create your models here.

class Suggestions(models.Model):
    
    category = models.CharField(max_length=50, verbose_name="Categoria")
    descriptCategory = models.CharField(max_length=50, verbose_name="Descripcion categoria") 


    def  _str_(self):
        return self.category
    
    class Meta:
        verbose_name = "Sugerencias"
        verbose_name_plural = "Sugerencias"
        db_table = "buzonsugerencias"
        ordering = ['id']
