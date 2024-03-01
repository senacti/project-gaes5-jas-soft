import os
from unittest import TestCase
import django
import pytest
from sales.models import PurchaseOrder

os.environ.setdefault('DJANGO_SETTINGS_MODULE', 'jas_softpy.settings')
django.setup()

class TestSale(TestCase):
    
    def setUp(self):
        self.PurchaseOrder = PurchaseOrder.objects.create(
            StockProduct = '20',
            PurchaseOrderDate = '2024/03/01',
            State = 'En camino',
            Product = 'Jarra',
            
        )
    
    def test_purchaseorder_creation(self):
        PurchaseOrder = PurchaseOrder.objects.get(id=self.PurchaseOrder.id)
        
        self.assertEqual(PurchaseOrder.StockProduct, '20')
        self.assertEqual(PurchaseOrder.PurchaseOrderDate, '2024/03/01')
        self.assertEqual(PurchaseOrder.State, 'En camino')
        self.assertEqual(PurchaseOrder.Product, 'Jarra')
        