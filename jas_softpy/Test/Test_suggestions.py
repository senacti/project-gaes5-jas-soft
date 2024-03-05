import os
from unittest import TestCase
import django
import pytest
from jas_softpy.suggestions.models import Suggestions
from suggestions.models import Suggestions


os.environ.setdefault('DJANGO_SETTINGS_MODULE', 'jas_softpy.settings')
django.setup()

class TestSuggestions(TestCase):
    
    def setUp(self):
        self.suggestions = Suggestions.objects.create(
            category = 'Acoso laboral',
            descriptCategory = 'El empleado bla bla',
        )
        
    def test_suggestions_creation(self):
        suggestion = Suggestions.objects.get(id=self.suggestions.id)
        
        self.assertEqual(suggestion.category, 'Acoso laboral')
        self.assertEqual(suggestion.descriptCategory, 'El empleado bla bla')