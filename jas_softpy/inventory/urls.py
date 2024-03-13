from django.urls import path
from . import views

app_name = 'inventory'

urlpatterns = [
    path('search', views.ProductSearchListView.as_view(), name='search'),
    path('<slug:slug>', views.ProductDeatilView.as_view(), name='product'),
]
