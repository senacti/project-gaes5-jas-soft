<<<<<<< Updated upstream
@extends('layouts.app')
=======
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
>>>>>>> Stashed changes

@section('template_title')
    Ordenpedido
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Ordenpedido') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('ordenpedido.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>                                                                        
										<th>Idordenpedido</th>
										<th>Cantidadproducto</th>
										<th>Fechapedido</th>
										<th>Idproducto</th>
										<th>Idestadopedido</th>

<<<<<<< Updated upstream
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
=======
                                        <td>
                                            <form action="{{ route('ordenpedido.eliminar', $ordenpedido->IdOrdenPedido) }}"
                                                method="POST">
                                                <a class="btn btn-sm btn-success"
                                                    href="{{ route('ordenpedido.edit', $ordenpedido->IdOrdenPedido) }}"><i
                                                        class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                @csrf                                               
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @include('ordenpedido.create')
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                            Agregar Produccion
                        </button>

                        <!-- The Modal -->
>>>>>>> Stashed changes

                                            <td>
                                                {{--<form action="{{ route('ordenpedido.eliminar',$ordenpedido->id) }}" method="POST">                                                    
                                                    <a class="btn btn-sm btn-success" href="{{ route('ordenpedido.edit',$ordenpedido->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>--}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
              
            </div>
<<<<<<< Updated upstream
        </div>
    </div>
@endsection
=======
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
        id = document.getElementById('idordenproducto').value;
        alert(id);
    }

    function abrirmodal() {
        $('#editar').show();
    }
</script>

</html>
>>>>>>> Stashed changes
