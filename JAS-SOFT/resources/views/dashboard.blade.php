<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/estilos-dash-admin.css') }}">
    <link rel="shortcut icon" href="{{ asset('PICTURES/iconlogo.png') }}" type="image/x-icon">
    <title>PromoPlast | Menú</title>
</head>
<body>
    
    <header class="dash-menu">
        <img class="logo-dash-admin" src="{{ asset('PICTURES/logo.png') }}" alt="logo">
        <ul class="list-menu-ul">
            <li class="list-menu-dash"> <img class="img-menu-dash" src="{{ asset('PICTURES/campana.png') }}" alt="Campana"> </li>
            <li class="list-menu-dash"> Administrador (Administrador) </li>
            <li class="list-menu-dash"> <img class="img-menu-dash rotate-img" src="{{ asset('PICTURES/flecha.png') }}" alt="flecha"> </li>
            <li class="list-menu-dash"> <img class="img-menu-dash-users" src="{{ asset('PICTURES/usuario.png') }}" alt=""> </li>
        </ul>
    </header>

    <nav class="descrip-menu">       
    </nav>
<center>
    <div class="contenedor">
        <a href="{{ url('ventas') }}" class="contenedor-moduls">
            <img class="img-moduls" src="{{ asset('PICTURES/carro.png') }}" alt="img01">            
            <h2 class="title-moduls">VENTAS</h2>
            <p class="text-moduls" >Guarda, modifica, consulta las ventas y mas...</p>
        </a>

        <a href="{{ url('inventario') }}" class="contenedor-moduls">
            <img class="img-moduls" src="{{ asset('PICTURES/inventario.png') }}" alt="img01">
            <h2 class="title-moduls">INVENTARIO</h2>
            <p class="text-moduls" >Crear, modifica, consulta los productos y mas...</p>
        </a>

        <a href="{{ url('rrhh') }}" class="contenedor-moduls">
            <img class="img-moduls" src="{{ asset('PICTURES/users.png') }}" alt="img01">
            <h2 class="title-moduls"> RECURSOS HUMANOS</h2>
            <p class="text-moduls" >Contrato, consulta de agendamiento y mas...</p>
        </a>

        <a href="{{ url('produccion') }}" class="contenedor-moduls">
            <img class="img-moduls" src="{{ asset('PICTURES/casco.png') }}" alt="img01">
            <h2 class="title-moduls">PRODUCCION</h2>
            <p class="text-moduls" >Insumos, provedores y mas...</p>
        </a>

        <a href="{{ url('error404') }}" class="contenedor-moduls">
            <img class="img-moduls" src="{{ asset('PICTURES/configuracion.png') }}" alt="img01">
            <h2 class="title-moduls">CONFIGURACION</h2>
            <p class="text-moduls" >Crear usuario, bloquear usuarios...</p>
        </a>

        <a href="{{ url('error500') }}" class="contenedor-moduls">
            <img class="img-moduls" src="{{ asset('PICTURES/configuracion.png') }}" alt="img01">
            <h2 class="title-moduls">PROXIMAMENTE</h2>
            <p class="text-moduls" > </p>
        </a>
    </div>
</center>
</body>
</html>
