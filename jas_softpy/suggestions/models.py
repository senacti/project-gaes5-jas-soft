from django.db import models

class Suggestions(models.Model):
    CATEGORY_CHOICES = [
        ('mobiliario', 'Mobiliario'),
        ('violencia_laboral', 'Violencia Laboral'),
        ('acoso_laboral', 'Acoso Laboral'),
        ('festividades', 'Festividades'),
    ]

    category = models.CharField(max_length=50, verbose_name="Categoría", choices=CATEGORY_CHOICES)
    descriptCategory = models.CharField(max_length=50, verbose_name="Descripción de la Categoría") 

    def __str__(self):
        return self.category
    
    class Meta:
        verbose_name = "Sugerencia"
        verbose_name_plural = "Sugerencias"
        db_table = "buzonsugerencias"
        ordering = ['id']
