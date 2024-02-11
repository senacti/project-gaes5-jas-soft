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

from production.models import ProductionOrder, Supplies

from .forms import RegisterForm
from django.contrib import messages


    
def home(request):
    return render(request,'home.html',{
        #context
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

def Postulacion(request):
    return render(request,'Postulacion.html',{
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
            login(request, user)
            messages.success(request, 'Bienvenido {}'.format(user.username))
            return redirect('admin:index')
        else:
            messages.error(request, 'Usuario o contraseña incorrectos')

    return render(request, 'login.html',{
        
    })

def logout_view(request):
    logout(request)
    messages.success(request, 'Sesión finalizada')
    return redirect('login.html')

def register(request):    

    if request.method == 'POST':
        form = RegisterForm(request.POST)
        if form.is_valid():
            username = form.cleaned_data['username']
            last_name = form.cleaned_data['last_name']
            email = form.cleaned_data['email']
            password = form.cleaned_data['password']

            user = User.objects.create_user(username=username, email=email, password=password, last_name=last_name)
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
   
    quantity_used = int(request.POST['stock'])
    supplies_id = request.POST['supplies_id']
    
    current_datetime = datetime.now()
    
    productionorder = ProductionOrder.objects.create(
        quantity_used=quantity_used, 
        supplies_id=supplies_id, 
        Production_OrderDate=current_datetime
    )
       
    supplies_instance = Supplies.objects.get(id=supplies_id)
    supplies_instance.stock -= quantity_used
    supplies_instance.save()

    messages.success(request, '¡Orden de producción creada exitosamente!')
    return redirect('ordenpedido')
                        
def edit_production_order(request, id):
        productionorder = ProductionOrder.objects.get(id=id)
        return render(request, "EditProductOrder.html", {"productionorder": productionorder})


def editProductionOrder(request):
    
    quantity_used = int(request.POST['stock'])
    
    
    current_datetime = datetime.now()    
    roductionorder = ProductionOrder.objects.update(
        quantity_used=quantity_used, 
        
        Production_OrderDate=current_datetime
    )
    
    supplies_instance = Supplies.objects.get(id)
    supplies_instance.stock -= quantity_used
    supplies_instance.save()

    messages.success(request, '¡Orden de producción actualizada!')
    return redirect('ordenpedido')
    
        


def deleteProductionOrder(request, pk):
    
    productionorder = ProductionOrder.objects.get(pk=pk)
    productionorder.delete()
    
    messages.success(request, 'Orden de producción eliminado!')

    return redirect('ordenpedido')         