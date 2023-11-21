from django.contrib.auth.forms import UserCreationForm
from django import forms
from .models import UserProfile

class CustomUserCreationForm(UserCreationForm):
    class Meta:
        model = UserProfile
        fields = UserCreationForm.Meta.fields + ('name', 'last_name',)
