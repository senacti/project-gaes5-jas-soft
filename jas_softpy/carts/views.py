from django.shortcuts import render


def cart(request):
    
    #request.session['cart_id'] = '123'
    
    valor = request.session.get('cart_id')
    print(valor)
    
    request.session['cart_id'] = None
    
    return render(request, 'carts/cart.html', {
        
    })
