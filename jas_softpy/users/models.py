from django.db import models
from django.contrib.auth.models import User
from django.contrib.auth.models import AbstractUser


class Customer(User):
    class Meta:
        proxy = True
        
    def get_products(self):
        return []

class Profile(models.Model):
    
    user = models.OneToOneField(User, on_delete=models.CASCADE)
    bio = models.TextField()