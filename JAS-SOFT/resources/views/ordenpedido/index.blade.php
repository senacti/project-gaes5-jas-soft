<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/Style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos-dash-admin.css') }}">

    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css') }}"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css') }}">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


    <link rel="shortcut icon" href="PICTURES/iconlogo.png">
    <title>PromoPlast | Produccion</title>
</head>

<body>
    <header class="dash-menu">
        <img class="logo-dash-admin" src="PICTURES/logo.png" alt="logo">
        <a class="nav-link" href="{{ url('/index') }}">INICIO</a>
        <ul class="list-menu-ul">
            <li class="list-menu-dash"> <img class="img-menu-dash" src="PICTURES/campana.png" alt="Campana"> </li>
            <li class="list-menu-dash"> Administrador (Administrador) </li>
            <li class="list-menu-dash"> <img class="img-menu-dash rotate-img" src="PICTURES/flecha.png" alt="flecha">
            </li>
            <li class="list-menu-dash"> <img class="img-menu-dash-users" src="PICTURES/usuario.png" alt="">
            </li>
        </ul>
    </header>


    <div class="container-fluid">
        <div class="row">
            <div class="col-2 barmenu">
                <h3 class="mt-4">PROMOPLAST</h3>
                <p></p>
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/dashboard') }}">MENU</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/rrhh') }}">RRHH</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/ordenpedidos') }}">PRODUCCION</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/productos') }}">INVENTARIO</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/ventas') }}">VENTAS</a>
                    </li>
                </ul>
            </div>

            <div class="col-10" id="contentd">
                <div class="card" id="cardash">
                    <nav class="descrip-menu">
                        <a class="message-ubication" href="{{ url('insumos') }}">Insumos</a>
                    </nav>
                    <div class="container mt-3">
                        <h2>PRODUCCION</h2>
                        <p></p>
                        <table class="table table-striped" id="tablas">
                            <thead>
                                <tr>
                                    <th>Codigo produccion</th>
                                    <th>Cantidadproducto</th>
                                    <th>Fechapedido</th>
                                    <th>Idproducto</th>
                                    <th>Idestadopedido</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($ordenpedidos as $ordenpedido)
                                    <tr>
                                        <td>{{ $ordenpedido->IdOrdenPedido }}</td>
                                        <td>{{ $ordenpedido->cantidadProducto }}</td>
                                        <td>{{ $ordenpedido->fechaPedido }}</td>
                                        <td>{{ $ordenpedido->IdProducto }}</td>
                                        <td>{{ $ordenpedido->IdEstadopedido }}</td>

                                        <td>
                                            <form action="{{ route('ordenpedido.edit') }}" method="post">
                                                @csrf
                                                <input type="hidden" id="idordenpedido" name="idordenpedido"
                                                    value="{{ $ordenpedido->IdOrdenPedido }}">
                                                <button type="submit"
                                                    class="btn btn-success btn-sm">{{ __('Editar') }}</button>
                                            </form>                                           
                                            <form action="{{ route('ordenpedido.eliminar', $ordenpedido->IdOrdenPedido) }}"
                                                method="POST">                                               
                                                @csrf
                                                <input type="hidden" id="idordenpedido" name="idordenpedido"
                                                    value="{{ $ordenpedido->IdOrdenPedido }}">
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <div>
                            </div>
                        </table>
                        @include('ordenpedido.create')
                        <div class="d-flex justify-content-around bg mb-3">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#create">
                                Agregar Produccion
                            </button>
                        </div>               
</body>

<script src="{{ asset('https://code.jquery.com/jquery-3.6.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/validaciones.js') }}"></script>
<script src="JS/slidebar.js"></script>

<script>
    $(document).ready(function() {
        $('#tablas').DataTable();
    });

    function mostrarid() {
        id = document.getElementById('idordenpedido').value;
        alert(id);
    }

    function abrirmodal() {
            $('#editar').show();
        }
</script>

</html>
