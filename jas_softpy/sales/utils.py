
from .models import Order
from django.urls import reverse 


def get_or_create_order(cart, request):
     
    order = cart.order
        
    if order is None and request.user.is_authenticated:
        order = Order.objects.create(cart=cart, user=request.user)
        
    if order:        
        request.session['order_id'] = order.order_id
        
    return order


def breadcrumb(products=True, addres=False, payment=False, confirmation=False):
    return[
        {'title':'Productos', 'active':products, 'url':reverse('sales:order')},
        {'title':'Dirección', 'active':addres, 'url':reverse('sales:order')},
        {'title':'Pago', 'active':payment, 'url':reverse('sales:order')},
        {'title':'Confirmación', 'active':confirmation, 'url':reverse('sales:order')}
    ]