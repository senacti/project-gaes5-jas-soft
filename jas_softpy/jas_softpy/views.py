from datetime import datetime
from django.shortcuts import get_object_or_404, render
from django.shortcuts import redirect
from django.contrib.auth import login
from django.contrib.auth import logout
from django.contrib.auth import authenticate
from django.template.loader import get_template
from django.conf import settings
from django.core.mail import EmailMultiAlternatives
from django.contrib.auth.models import User
from django.views.decorators.http import require_POST
from django.urls import reverse
from django.contrib.auth.decorators import login_required
from django.contrib.auth import logout
from django.shortcuts import redirect
from production.views import SuppliesListView
from django.contrib.auth.models import User, Permission
from itertools import groupby

from production.models import ProductionOrder, SupplieProduction, Supplies
from inventory.models import Product
from postulation.models import Postulation

from .forms import RegisterForm
from django.contrib import messages

# Se declaran variables globales
MODULO_PRODUCCION = ['add_productionorder', 'change_productionorder', 'delete_productionorder', 'view_productionorder', 
                         'add_supplies', 'change_supplies', 'delete_supplies', 'view_supplies',
                         'add_supplieproduction', 'change_supplieproduction', 'delete_supplieproduction', 'view_supplieproduction']
    
MODULO_INVENTARIO = ['add_product', 'change_product', 'delete_product', 'view_product', 
                        'add_flow', 'change_flow', 'delete_flow', 'view_flow']

MODULO_VENTA      = ['add_purchaseorder', 'change_purchaseorder', 'delete_purchaseorder', 'view_purchaseorder', 
                        'add_pays', 'change_pays', 'delete_pays', 'view_pays', 
                        'add_sales', 'change_sales', 'delete_sales', 'view_sales']

MODULO_GESTION    = ['add_employed', 'change_employed', 'delete_employed', 'view_employed',
                        'add_postulation', 'change_postulation', 'delete_postulation', 'view_postulation',  
                        'add_contract', 'change_contract', 'delete_contract', 'view_contract', 
                        'add_scheduling', 'change_scheduling', 'delete_scheduling', 'view_scheduling']

def logout_view(request):
    logout(request)
    return redirect('index')
        
def home(request):

    moduloProduccion = False
    moduloInventario = False
    moduloVenta      = False
    moduloGestion    = False

    nombres_permisos = obtenerPermisosUsuarioPorModulo(request)
    
    for nombre_permiso in nombres_permisos:
        if nombre_permiso in MODULO_PRODUCCION:
            moduloProduccion = True
            
        if nombre_permiso in MODULO_INVENTARIO:
            moduloInventario = True

        if nombre_permiso in MODULO_VENTA:
            moduloVenta = True

        if nombre_permiso in MODULO_GESTION:
            moduloGestion = True

    return render(request, 'home.html', {
        'permission_production': moduloProduccion, 'permission_inventory': moduloInventario, 'permission_venta': moduloVenta, 'permission_gestion': moduloGestion
    })

def producto(request):
    return render(request,'producto.html',{
        #context
    })

def ventas(request):
    return render(request,'ventas.html',{
        #context
    })

def rrhh(request):
    return render(request,'rrhh.html',{
        #context
    })

def postulacion(request):
    return render(request,'postulation/Postulacion.html',{
        #context
    })

def ordenpedido(request):
    return render(request,'ordenpedido.html',{
        #context
    })

def insumo(request):
    return render(request,'insumo.html',{
        #context
    })

def ofertas(request):
    return render(request,'ofertas.html',{
        #context
    })

def send_email(mail):
    context = {'mail': mail}

    template = get_template('correo.html')
    content = template.render(context)

    email = EmailMultiAlternatives(
        'Correo de prueba',
        'Primer correo JAS_SOFT',
        settings.EMAIL_HOST_USER,
        [mail],
    )

    email.attach_alternative(content, 'text/html')
    email.send()

def sugerencias(request):
    if request.method == 'POST':
        mail = request.POST.get('mail')

        send_email(mail)
        
    return render(request,'sugerencias.html',{})

def index(request):
    return render(request,'index.html',{
        #context
    })    

def sales(request):
    return render(request,'sales.html',{
        #context
    })   

def login_view(request):
    if request.method == 'POST':
        username = request.POST.get('username')
        password = request.POST.get('password')

        user = authenticate(username=username, password=password)
        if user:
            if user.is_staff:
                login(request, user)
                messages.success(request, 'Bienvenido {}'.format(user.username))
                return redirect('admin:index')
            else:
                login(request, user)
                return home(request)
                
        else:
            messages.error(request, 'Usuario o contraseña incorrectos')

    return render(request, 'login.html',{
        
    })

def logout_view(request):
    logout(request)
    messages.success(request, 'Sesión finalizada')
    return redirect('index')

def register(request):    

    if request.method == 'POST':
        form = RegisterForm(request.POST)
        if form.is_valid():
            username = form.cleaned_data['username']
            first_name = form.cleaned_data['name']
            last_name = form.cleaned_data['last_name']
            email = form.cleaned_data['email']
            password = form.cleaned_data['password']

            user = User.objects.create_user(username=username, email=email, password=password, last_name=last_name, first_name=first_name )
            if user:
                login(request, user)
                messages.success(request, 'Registro exitoso')
                return redirect('login_jas')
            
    else:
        form = RegisterForm()

    context = {
        'form': form,
    }
    return render(request, 'register.html', context)

def create_production_order(request):
    if request.method == 'POST':
        try:
            quantity_used = int(request.POST['quantity_used[]'])
            supplies_ids = request.POST.getlist('supplies_id[]')

            current_datetime = datetime.now()

            for supplies_id in supplies_ids:
                supplies_instance = Supplies.objects.get(id=supplies_id)

                if quantity_used <= supplies_instance.stock:
                    production_order = ProductionOrder.objects.create()

                    SupplieProduction.objects.create(
                        quantity=quantity_used,
                        Production_OrderDate=current_datetime,
                        production_order=production_order,
                        supplies=supplies_instance
                    )

                    supplies_instance.stock -= quantity_used
                    supplies_instance.save()
                else:
                    messages.error(request, f'No hay suficiente stock para el insumo {supplies_instance.name}')
                    return redirect('ordenpedido') 

            messages.success(request, '¡Orden de producción creada exitosamente!')
            return redirect('ordenpedido') 

        except Exception as e:
            messages.error(request, f'Error al procesar el formulario: {str(e)}')
            return redirect('ordenpedido') 
    else:
        return render(request, 'ordenpedido.html')
                        
def edit_production_order(request, id):
        productionorder = ProductionOrder.objects.get(id=id)
        return render(request, "EditProductOrder.html", {"ProductionOrder": productionorder})

def editProductionOrder(request,id):  
    if request.metthod == 'POST':
        productionorder = get_object_or_404(ProductionOrder, id=id)
        productionorder.quantity_used = int(request.POST.get('quantity_used',0))
    
    messages.success(request, '¡Orden de producción actualizada!')
    return redirect('ordenpedido')
    
def deleteProductionOrder(request, id):    
    productionorder = get_object_or_404(ProductionOrder, id=id)
    productionorder.delete()
    messages.success(request, 'Orden de producción eliminada!')
    
    return redirect('ordenpedido')   

def save(self, *args, **kwargs):
        if not self.id:
            last_object = Supplies.objects.last()
            if last_object:
                self.supplieCode = last_object.supplieCode + 1
            else:
                self.supplieCode = 100001
        super(Supplies, self).save(*args, **kwargs) 

def createsupplies(request):
   
    name = request.POST['name']
    stock = int(request.POST['stock'])
    size = request.POST['size']
    color = request.POST['color']    

    supplies = Supplies.objects.create(
        name = name, 
        stock = stock, 
        size = size,
        color = color,
    )
    
    messages.success(request, '¡el insumo se registro exitosamente!')
    return redirect('insumo')

def editsupplies(request, id):
    supplies = Supplies.objects.get(id=id)
    return render(request, "supplies/EditSupplies.html", {"Supplies":supplies})
    
@require_POST
def EditSupplies(request, id):
    if request.method == 'POST':
        supplies = get_object_or_404(Supplies, id=id)
        supplies.name = request.POST.get('name', '')
        supplies.stock = int(request.POST.get('stock', 0))
        supplies.size = request.POST.get('size', '')
        supplies.color = request.POST.get('color', '')       
        supplies.save()
        messages.success(request, '¡El insumo se ha actualizado!')
    else:
        messages.error(request, 'La solicitud no es válida.')

    return redirect('insumo')
    
def deleteSupplies(request, id):
    
    supplies = Supplies.objects.get(pk=id)
    supplies.delete()    
    messages.success(request, 'Orden de producción eliminado!')
    return redirect('insumo')         

def createinventory(request):
    if request.method == 'POST':     
        name = request.POST.get('name')
        stock = request.POST.get('stock')
        current_datetime = datetime.now()
        size = request.POST.get('size')
        color = request.POST.get('color')
        state = request.POST.get('state')
        category = request.POST.get('category')
        image = request.FILES.get('image')

        inventory = Product.objects.create(
            name = name, 
            stock = stock, 
            size = size,
            color = color,
            state = state,
            category = category,
            image = image,
            fabricationDate = current_datetime 
        )
    
    messages.success(request, '¡el producto se registro exitosamente!')
    return redirect('producto')

def editinventory(request, id):
    producto = Product.objects.get(id=id)    
    return render(request, "inventory/editInventory.html", {"Product":producto})

@require_POST
def EditInventory(request, id):       
    if request.method == 'POST':
        producto = get_object_or_404(Product, id=id)
        producto.name = request.POST.get('name','')
        producto.stock = int(request.POST.get('stock', 0)) 
        producto.size = request.POST.get('size', '')
        producto.color = request.POST.get('color', '')
        producto.state = request.POST.get('state', '')
        producto.category = request.POST.get('category', '')     
        producto.save()
        messages.success(request, '¡El producto se ha actualizado!')
    else:
        messages.error(request, '¡La solicitud no es valida!')
    
    return redirect('producto')

def deleteinventory(request, id):
    
    producto = Product.objects.get(pk=id)
    producto.delete()    
    messages.success(request, 'Producto eliminado!')
    return redirect('producto')

def obtenerPermisosUsuarioPorModulo(request):
    usuario_actual = request.user
    permisos_usuario = usuario_actual.user_permissions.all()
    # Obtener los nombres de los permisos asociados al usuario
    nombres_permisos = permisos_usuario.values_list('codename', flat=True)
    
    return nombres_permisos

def create_postulation(request):

    if request.method == 'POST':
        start_offers = datetime.now()
        descrip_offer = request.POST['descripOffer']
        profile_postulation = request.POST['profilePostulation']
        state_postulations = request.POST['StatePostulations']    

        postulation = Postulation.objects.create(
            startOffers=start_offers, 
            descripOffer=descrip_offer, 
            profilePostulation=profile_postulation,
            StatePostulations=state_postulations,
        )
        messages.success(request, '¡La postulación se registró exitosamente!')
        return redirect('Postulacion')
