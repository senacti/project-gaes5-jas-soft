from django.urls import path
from . import views

urlpatterns = [
    path('<slug:slug>',views.ProductDeatilView.as_view(), name = 'product')
]