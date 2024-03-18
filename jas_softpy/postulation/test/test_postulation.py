import pytest
from django.utils import timezone
from postulation.models import Employed, Postulation, Scheduling, Contract

@pytest.mark.django_db
def test_create_employed():
    employed = Employed.objects.create(name="Juan", position="Administrador")
    assert Employed.objects.filter(name="Juan").exists()

@pytest.mark.django_db
def test_delete_postulation():
    postulation = Postulation.objects.create(startOffers=timezone.now(), descripOffer="Oferta de trabajo", profilePostulation="Perfil", StatePostulations="Activa")
    postulation.delete()
    assert not Postulation.objects.filter(descripOffer="Oferta de trabajo").exists()

@pytest.mark.django_db
def test_edit_contract():
    contract = Contract.objects.create(contractdate=timezone.now(), TypeContract="Término Fijo", Employed=Employed.objects.create(name="Maria", position="JefeDeVentas"))