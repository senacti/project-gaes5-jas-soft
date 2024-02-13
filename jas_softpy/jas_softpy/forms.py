from django import forms
from django.contrib.auth.models import User


class RegisterForm(forms.Form):
    username = forms.CharField(label='Usuario', required=True, widget=forms.TextInput(attrs={
        'class': 'form-control controls col-md-4 col-form-label text-md-end',
        'id': 'username',
        'placeholder': 'Usuario20P'
    }))
    last_name = forms.CharField(label='Apellido', required=True, min_length=4, max_length=50, widget=forms.TextInput(attrs={
        'class': 'form-control controls col-md-4 col-form-label text-md-end',
        'id': 'last_name',
        'placeholder': 'Rodriguez'
    }))
    email = forms.CharField(label='Correo', required=True, widget=forms.EmailInput(attrs={
        'class': 'form-control controls col-md-4 col-form-label text-md-end',
        'id': 'email',
        'placeholder': 'usuario@gmail.com'
    }))
    password = forms.CharField(label='Contraseña', required=True, widget=forms.PasswordInput(attrs={
        'class': 'form-control controls col-md-4 col-form-label text-md-end',
        'id': 'password',
        'placeholder': '*********'
    }))

    password2 = forms.CharField(label='Confirmar contraseña', required=True, widget=forms.PasswordInput(attrs={
        'class': 'form-control controls col-md-4 col-form-label text-md-end',
        'id': 'password-confirm',
        'placeholder': '*********'
    }))

    def clean_username(self):
        username = self.cleaned_data.get('username')

        if User.objects.filter(username=username).exists():
            raise forms.ValidationError("El nombre ya se encuentra en uso")
        return username
    
    def clean_email(self):
        email = self.cleaned_data.get('email')

        if User.objects.filter(email=email).exists():
            raise forms.ValidationError("El correo ya se encuentra en uso")
        return email
    
    def clean(self):
        cleaned_data = super().clean()

        if cleaned_data.get('password2') != cleaned_data.get('password'):
            self.add_error('password2', 'La contraseña no coincide')

