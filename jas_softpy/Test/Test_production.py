import sys

import pytest
sys.path.append('jas_softpy')

import os

os.environ.setdefault('DJANGO_SETTINGS_MODULE', 'jas_softpy.settings')

from django.test import TestCase
from django.core.exceptions import ImproperlyConfigured
from django.conf import settings

from production.models import Supplies

# We need to do this here, before any of our tests run, since they
# might try to use the INSTALLED_APPS setting.
try:
    settings.INSTALLED_APPS
except ImproperlyConfigured as e:
    if "The SECRET_KEY setting must not be empty." in str(e):
        pytest.skip("Can't run tests without a SECRET_KEY in the environment.")
    raise

class TestSupplies(TestCase):
    
    def setUp(self):
        self.supplies = Supplies.objects.create(
            name = 'Plastico',
            stock = '49',
            size = 'L',
            color = 'Negro',
            suppliesCode = '100001'
        )
    
    def test_supplies_creation(self):
        supplie = Supplies.objects.get(id=self.supplies.id)
        
        self.assertEqual(supplie.name, 'Plastico')
        self.assertEqual(supplie.stock, '49')
        self.assertEqual(supplie.size, 'L')
        self.assertEqual(supplie.color, 'Negro')
        self.assertEqual(supplie.suppliesCode, '100001')
        self.assertEqual(supplie.suppliesCode, '100001')

