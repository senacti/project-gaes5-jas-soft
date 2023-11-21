from django.contrib.auth.models import AbstractBaseUser, BaseUserManager

class CustomUser(AbstractBaseUser):
    
    email = models.EmailField(unique=True)
    name = models.CharField(max_length=150, null=True, blank=True)
    last_name = models.CharField(max_length=150, null=True, blank=True)
    

    
    USERNAME_FIELD = 'email'

   
    objects = BaseUserManager()