from django.urls import path
#from .views import OfferListView
from . import views

app_name = 'postulation'

urlpatterns = [
    path('ofertas/',views.OfferListView.as_view(), name='lista_ofertas'),
]
