from django.shortcuts import render
    
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
    
def sugerencias(request):
    return render(request,'sugerencias.html',{
        #context
    })

def index(request):
    return render(request,'index.html',{
        #context
    })    

def sales(request):
    return render(request,'sales.html',{
        #context
    })   

def login(request):
    return render(request,'login.html',{
        #context
    })   