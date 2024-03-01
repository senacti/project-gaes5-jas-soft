import os
import django
from django.test import TestCase
import pytest
from postulation.models import Postulation
from datetime import datetime
from django.utils import timezone

os.environ.setdefault('DJANGO_SETTINGS_MODULE', 'jas_softpy.settings')
django.setup()

class TestPostulation(TestCase):

    def setUp(self):
        self.postulation = Postulation.objects.create(
            startOffers=timezone.now(),
            descripOffer="Oferta de trabajo",
            profilePostulation="Perfil de trabajo",
            StatePostulations="Activa"
        )

    def test_postulation_creation(self):
        postulation = Postulation.objects.get(id=self.postulation.id)

        self.assertEqual(postulation.descripOffer, "Oferta de trabajo")
        self.assertEqual(postulation.profilePostulation, "Perfil de trabajo")
        self.assertEqual(postulation.StatePostulations, "Activa")
