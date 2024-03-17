import sys
from django.test import TestCase
import pytest
sys.path.append('jas_softpy')

import os

os.environ.setdefault('DJANGO_SETTINGS_MODULE', 'jas_softpy.settings')

from django.test import TestCase
from django.core.exceptions import ImproperlyConfigured
from django.conf import settings

from production.models import ProductionOrder, SupplieProduction, Supplies


try:
    settings.INSTALLED_APPS
except ImproperlyConfigured as e:
    if "The SECRET_KEY setting must not be empty." in str(e):
        pytest.skip("Can't run tests without a SECRET_KEY in the environment.")
    raise


class SuppliesTestCase(TestCase):
    @classmethod
    def setUpTestData(cls):
        # Configurar datos de prueba
        Supplies.objects.create(name="Tornillo", stock=100, size="10mm", color="Plateado")

    def test_decrease_stock(self):
        supply = Supplies.objects.get(name="Tornillo")
        initial_stock = supply.stock
        quantity_to_decrease = 50
        supply.decrease_stock(quantity_to_decrease)
        updated_supply = Supplies.objects.get(name="Tornillo")
        self.assertEqual(updated_supply.stock, initial_stock - quantity_to_decrease)

    def test_decrease_stock_invalid_quantity(self):
        supply = Supplies.objects.get(name="Tornillo")
        with self.assertRaises(ValueError):
            supply.decrease_stock(200)

    def test_supplie_code_generation(self):
        new_supply = Supplies.objects.create(name="Tuerca", stock=50, size="12mm", color="Negro")
        self.assertEqual(new_supply.supplieCode, "100002")  

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
    
    def test_supplies_update(self):
        supplie = Supplies.objects.get(id=self.supplies.id)
        
        supplie.name = 'Plastico editado'
        supplie.stock = '51'
        supplie.size = 'M'
        supplie.color = 'Blanco'
        supplie.suppliesCode = '100002'
        
        supplie.save()
        
        supplie = Supplies.objects.get(id=self.supplies.id)
        
        self.assertEqual(supplie.name, 'Plastico editado')
        self.assertEqual(supplie.stock, '51')
        self.assertEqual(supplie.size, 'M')
        self.assertEqual(supplie.color, 'Blanco')
        self.assertEqual(supplie.suppliesCode, '100002')
        
    def test_supplies_delete(self):
        supplie = Supplies.objects.get(id=self.supplies.id)
        
        supplie.delete()
        
        self.assertFalse(Supplies.objects.filter(id=self.supplies.id).exists())


class TestProductionOrder(TestCase):
    def setUp(self):
        self.production_order = ProductionOrder.objects.create()
        
    def test_production_order_creation(self):
        production_order = ProductionOrder.objects.get(id=self.production_order.id)
        
        self.assertEqual(production_order.id, 1)
        
    def test_production_order_update(self):
        production_order = ProductionOrder.objects.get(id=self.production_order.id)
        
        production_order.supplies.add(self.supplies)
        
        production_order = ProductionOrder.objects.get(id=self.production_order.id)
        
        self.assertQuerysetEqual(production_order.supplies.all(), [self.supplies], lambda x: x)
        
    def test_production_order_delete(self):
        production_order = ProductionOrder.objects.get(id=self.production_order.id)
        
        production_order.delete()
        
        self.assertFalse(ProductionOrder.objects.filter(id=self.production_order.id).exists())
        
        
class TestSupplieProduction(TestCase):
    def setUp(self):
        self.supplie_production = SupplieProduction.objects.create(
            production_order = self.production_order,
            supplies = self.supplies,
            quantity = 1
        )
        
    def test_supplie_production_creation(self):
        supplie_production = SupplieProduction.objects.get(id=self.supplie_production.id)
        
        self.assertEqual(supplie_production.id, 1)
        self.assertEqual(supplie_production.quantity, 1)
        self.assertEqual(supplie_production.production_order, self.production_order)
        self.assertEqual(supplie_production.supplies, self.supplies)
        
    def test_supplie_production_update(self):
        supplie_production = SupplieProduction.objects.get(id=self.supplie_production.id)
        
        supplie_production.quantity = 2
        supplie_production.save()
        
        supplie_production = SupplieProduction.objects.get(id=self.supplie_production.id)
        
        self.assertEqual(supplie_production.quantity, 2)
        
    def test_supplie_production_delete(self):
        supplie_production = SupplieProduction.objects.get(id=self.supplie_production.id)
        
        supplie_production.delete()
        
        self.assertFalse(SupplieProduction.objects.filter(id=self.supplie_production.id).exists())
        


