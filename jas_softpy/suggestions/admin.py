from django.contrib import admin

# Register your models here.

from .models import Suggestions

@admin.register(Suggestions)
class SuggestionsAdmin(admin.ModelAdmin):
    list_display = ('category', 'descriptCategory')
    search_fields = ('category',)
    list_editable = ()
    list_filter = ('category',)