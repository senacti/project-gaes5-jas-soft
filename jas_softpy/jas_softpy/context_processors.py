from django.contrib.auth.models import Permission

# Se declaran variables globales
MODULO_PRODUCCION = ['add_productionorder', 'change_productionorder', 'delete_productionorder', 'view_productionorder', 
                     'add_supplies', 'change_supplies', 'delete_supplies', 'view_supplies',
                     'add_supplieproduction', 'change_supplieproduction', 'delete_supplieproduction', 'view_supplieproduction']

MODULO_INSUMO = ['add_supplies', 'change_supplies', 'delete_supplies', 'view_supplies']
MODULO_ORDEN_PEDIDO = ['add_purchaseorder', 'change_purchaseorder', 'delete_purchaseorder', 'view_purchaseorder']

MODULO_INVENTARIO = ['add_product', 'change_product', 'delete_product', 'view_product', 
                     'add_flow', 'change_flow', 'delete_flow', 'view_flow']

MODULO_VENTA      = ['add_sales', 'change_sales', 'delete_sales', 'view_sales']

MODULO_GESTION    = ['add_employed', 'change_employed', 'delete_employed', 'view_employed',
                     'add_postulation', 'change_postulation', 'delete_postulation', 'view_postulation',  
                     'add_contract', 'change_contract', 'delete_contract', 'view_contract', 
                     'add_scheduling', 'change_scheduling', 'delete_scheduling', 'view_scheduling']

MODULO_SUGERENCIA = ['add_suggestions', 'change_suggestions', 'delete_suggestions', 'view_suggestions']

MODULO_POSTULACION = ['add_postulation', 'change_postulation', 'delete_postulation', 'view_postulation']

def user_permissions(request):
    if request.user.is_authenticated:
        permisos = request.user.get_all_permissions()
        partes_permisos = [permiso.split('.')[1] for permiso in permisos]
        return {'user_permissions': partes_permisos}
    else:
        return {'user_permissions': None}
    
def obtenerPermisosUsuarioPorModulo(request):
    usuario_actual = request.user
    permisos_usuario = usuario_actual.user_permissions.all()
    # Obtener los nombres de los permisos asociados al usuario
    nombres_permisos = permisos_usuario.values_list('codename', flat=True)
    
    moduloProduccion = False
    moduloInsumo = False
    moduloOrdenPedido = False
    moduloInventario = False
    moduloVenta = False
    moduloGestion = False
    moduloSugerencia = False
    moduloPostulacion = False

    for nombre_permiso in nombres_permisos:
        if nombre_permiso in MODULO_PRODUCCION:
            moduloProduccion = True

        if nombre_permiso in MODULO_INSUMO:
            moduloInsumo = True

        if nombre_permiso in MODULO_ORDEN_PEDIDO:
            moduloOrdenPedido = True
            
        if nombre_permiso in MODULO_INVENTARIO:
            moduloInventario = True

        if nombre_permiso in MODULO_VENTA:
            moduloVenta = True

        if nombre_permiso in MODULO_GESTION:
            moduloGestion = True

        if nombre_permiso in MODULO_SUGERENCIA:
            moduloSugerencia = True
            
        if nombre_permiso in MODULO_POSTULACION:
            moduloPostulacion = True

    return {
        'permission_production': moduloProduccion,
        'permission_insumo': moduloInsumo,
        'permission_orden_pedido': moduloOrdenPedido,
        'permission_inventory': moduloInventario,
        'permission_venta': moduloVenta,
        'permission_gestion': moduloGestion,
        'permission_sugerencia': moduloSugerencia,
        'permission_postulacion': moduloPostulacion
    }
