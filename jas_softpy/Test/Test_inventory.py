import os
from unittest import TestCase
import django
import pytest
from inventory.models import Flow, Product

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

    def test_product_update(self):
        inventory = Product.objects.get (id=self.inventory.id)

        inventory.name = 'pedrito'
        inventory.stock = '466'
        inventory.fabricationDate = '2024/09/23'
        inventory.size = '2l'
        inventory.color = 'rojo'
        inventory.productCode = '0002'
        inventory.state = 'En almacén'
        inventory.category = 'vasos'

        inventory.save()

        inventory = Product.objects.get (id=self.inventory.id)

        self.assertEqual(inventory.name, 'pedrito')
        self.assertEqual(inventory.stock, '466')
        self.assertEqual(inventory.fabricationDate, '2024-09-23')
        self.assertEqual(inventory.size, '2l')
        self.assertEqual(inventory.color, 'rojo')
        self.assertEqual(inventory.productCode, '0002')
        self.assertEqual(inventory.state, 'En almacén')
        self.assertEqual(inventory.category, 'vasos')

class TestFlow(TestCase):
    def test_product_delete(self):
        inventory = Product.objects.get (id=self.inventory.id)

        inventory.delete()

        with pytest.raises(Product.DoesNotExist):
            Product.objects.get (id=self.inventory.id)
        self.assertEqual(inventory.category, 'botellas')
    def test_flow_create(self):
        flow = Flow.objects.create(
            FlowType='Entrada',
            Product=self.product,
            supplies=self.supplies
        )
        self.assertEqual(flow.FlowType, 'Entrada')
        self.assertEqual(flow.Product.productCode, '0001')
        self.assertEqual(flow.supplies.supplieCode, '001')

    def test_flow_update(self):
        flow = Flow.objects.get (id=self.flow.id)

        flow.FlowType = 'Salida'
        flow.Product = self.product2
        flow.supplies = self.supplies2

        flow.save()

        flow = Flow.objects.get (id=self.flow.id)

        self.assertEqual(flow.FlowType, 'Salida')
        self.assertEqual(flow.Product.productCode, '0002')
        self.assertEqual(flow.supplies.supplieCode, '002')

    def test_flow_delete(self):
        flow = Flow.objects.get (id=self.flow.id)

        flow.delete()

        with pytest.raises(Flow.DoesNotExist):
            Flow.objects.get (id=self.flow.id)
