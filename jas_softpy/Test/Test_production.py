import os
from unittest import TestCase
import django
import pytest
from production.models import Supplies

os.environ.setdefault('DJANGO_SETTINGS_MODULE', 'jas_softpy.settings')
django.setup()

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
        self.assertEqual(supplie.supplieCode, '100001')