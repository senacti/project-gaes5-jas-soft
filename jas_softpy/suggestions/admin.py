from django.contrib import admin
from .models import Suggestions

# Register your models here.






@admin.register(Suggestions)
class SuggestionsAdmin(admin.ModelAdmin):
    list_display = ('category', 'descriptCategory' )
    search_fields = ('category')
    list_editable = ()
    list_filter = ('category')
    

