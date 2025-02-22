<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/Style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/footer.css') }}">

    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos-dash-admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="shortcut icon" href="PICTURES/iconlogo.png">
    <title>PromoPlast | Ventas</title>
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
                        <a class="nav-link" href="{{ url('/ventum') }}">VENTAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/buzonsugerencia') }}">BUZON</a>
                    </li>
                </ul>
            </div>

            <div class="col-10" id="contentd">
                <div class="card" id="cardash">
                    <nav class="descrip-menu">
                        <a class="message-ubication" href="{{ url('/rrhh') }}">RRHH</a>
                        <a class="message-ubication" href="{{ url('/produccion') }}">PRUEBAS</a>
                    </nav>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">

                                    <div class="d-flex justify-content-around bg mb-3">
                                        @include ('postulacion.create')
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                            Nueva Postulacion
                                        </button>
                                    </div>

                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <thead class="thead">
                                                <tr>
                                                    <th>IdPostulacion</th>
                                                    <th>Fechapostulacion</th>
                                                    <th>Descripoferta</th>
                                                    <th>Perfilpostulacion</th>
                                                    <th>Iddetallesoferta</th>
                                                    <th>Idempleado</th>
                                                    <th>Idestadopostulaciones</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($postulaciones as $postulacion)
                                                <tr>
                                                    <td>{{ $postulacion->IdPostulacion }}</td>
                                                    <td>{{ $postulacion->FechaPostulacion }}</td>
                                                    <td>{{ $postulacion->DescripOferta }}</td>
                                                    <td>{{ $postulacion->PerfilPostulacion }}</td>
                                                    <td>{{ $postulacion->IdDetallesOferta }}</td>
                                                    <td>{{ $postulacion->IdEmpleado }}</td>
                                                    <td>{{ $postulacion->IdEstadoPostulaciones }}</td>
                                                    <td>
                                                        <form action="{{ route('postulacion.edit') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="idpostulacion" value="{{ $postulacion->IdPostulacion }}">
                                                            <button type="submit" class="btn btn-success btn-sm">{{ __('Editar') }}</button>
                                                        </form>
                                                        <form action="{{ route('postulacion.eliminar') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="idpostulacion" value="{{ $postulacion->IdPostulacion }}">
                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                <i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('https://code.jquery.com/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset ('https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('JS/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('JS/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#tablas').DataTable();
        });

        function mostrarid() {
            id = document.getElementById('idpostulacion').value;
            alert(id);
        }

        function abrirmodal() {
            $('#editar').show();
        }
    </script>
</body>

</html>