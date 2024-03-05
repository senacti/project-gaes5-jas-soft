from django.contrib.auth.models import Permission

def user_permissions(request):
    if request.user.is_authenticated:
        permisos = request.user.get_all_permissions()
        partes_permisos = [permiso.split('.')[1] for permiso in permisos]
        return {'user_permissions': partes_permisos}
    else:
        return {'user_permissions': None}
