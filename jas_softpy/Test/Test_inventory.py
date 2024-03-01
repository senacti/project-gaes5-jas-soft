import os
from unittest import TestCase
import django
import pytest
from inventory.models import Product


os.environ.setdefault('DJANGO_SETTINGS_MODULE', 'jas_softpy.settings')
django.setup()

class TestInventory (TestCase):

    def setUp(self):
        self.inventory = Product.objects.create (
            name = 'juancho',
            stock = '456',
            fabricationDate = '2024/08/23',
            size = '1l',
            color = 'azul',
            productCode = '0001',
            state = 'En producción',
            category = 'botellas',
        )

    def test_product_creation(self):
        inventory = Product.objects.get (id=self.inventory.id)

        self.assertEqual(inventory.name, 'juancho')
        self.assertEqual(inventory.stock, '456')
        self.assertEqual(inventory.fabricationDate, '2024-08-23')
        self.assertEqual(inventory.size, '1l')
        self.assertEqual(inventory.color, 'azul')
        self.assertEqual(inventory.productCode, '0001')
        self.assertEqual(inventory.state, 'En producción')
        self.assertEqual(inventory.category, 'botellas')