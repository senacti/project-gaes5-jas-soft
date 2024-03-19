from django.shortcuts import render
from django.views.generic.list import ListView
from .models import Suggestions


class SuggestionsListView(ListView):
    template_name = "suggestions/sugerencias.html"
    queryset = Suggestions.objects.all().order_by('-id')

    def get_context_data(self, **kwargs):
        context = super().get_context_data(**kwargs)
        context['message'] = 'Sugerencias'
        print(context)
        return context
