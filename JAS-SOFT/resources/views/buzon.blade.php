<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/buzonp.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('CSS/Style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('CSS/buzonp.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('CSS/Header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('CSS/footer.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('CSS/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('CSS/estilos-dash-admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <script src="{{ asset('JS/bootstrap.bundle.min.js') }}"></script>


    <link rel="shortcut icon" href="{{ asset('PICTURES/iconlogo.png') }}">
    <title>PromoPlast | Buzón de sugerencias</title>
</head>

<body>
    <header class="dash-menu">
        <img class="logo-dash-admin" src="{{ asset('PICTURES/logo.png') }}" alt="logo">
        <a href="{{ url('/') }}" class="btn">HOME</a>
        <ul class="list-menu-ul">
            <li class="list-menu-dash"> <img class="img-menu-dash" src="{{ asset('PICTURES/campana.png') }}" alt="Campana"> </li>
            <li class="list-menu-dash"> Administrador (Administrador) </li>
            <li class="list-menu-dash"> <img class="img-menu-dash rotate-img" src="{{ asset('PICTURES/flecha.png') }}" alt="flecha"> </li>
            <li class="list-menu-dash"> <img class="img-menu-dash-users" src="{{ asset('PICTURES/usuario.png') }}" alt=""> </li>
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
            <a class="nav-link" href="{{ url('/produccion') }}">PRODUCCION</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/inventario') }}">INVENTARIO</a>
            
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/ventas') }}">VENTAS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/buzon') }}">BUZON</a>
          </li>
        </ul>        
      </div>

            <div class="col-10" id="contentd">
                <div class="card" id="cardash">

                    <div class="container mt-3">
                        <h2>Buzón de sugerencias</h2>
                        <p></p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>

                        <div class="search-bar">
                            <input type="text" placeholder="Buscar...">
                            <button type="button"></button>
                        </div>
                        <nav class="descrip-menu">
                            <a class="message-ubication" href="{{ url('/agregar') }}">Agregar</a>
                        </nav>
                        <nav class="descrip-menu">
                            <a class="message-ubication" href="{{ url('/sugerencia') }}">Enviar Sugerencia</a>
                        </nav>

                        <table class="table table-striped" id="tablas">
                            <thead>
                                <tr>

                                    <th>Categoría</th>
                                    <th>Fecha de creación</th>
                                    <th>E-mail asociado</th>
                                    <th>Acciones</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <td>Mobiliario</td>
                                    <td>23/03/2023</td>
                                    <td>asociado@gmail.com</td>
                                    <td>
                                        <button class="btn btn-primary btn-editar">Editar</button>
                                        <button class="btn btn-danger btn-eliminar">Eliminar</button>
                                    </td>

                                </tr>
                                <tr>

                                    <td>Acoso laboral</td>
                                    <td>23/03/2023</td>
                                    <td>asociado@gmail.com</td>
                                    <td>
                                        <button class="btn btn-primary btn-editar">Editar</button>
                                        <button class="btn btn-danger btn-eliminar">Eliminar</button>
                                    </td>

                                </tr>
                                <tr>

                                    <td>Festividades</td>
                                    <td>23/03/2023</td>
                                    <td>asociado@gmail.com</td>
                                    <td>
                                        <button class="btn btn-primary btn-editar">Editar</button>
                                        <button class="btn btn-danger btn-eliminar">Eliminar</button>
                                    </td>

                                </tr>
                                <tr>

                                    <td>Instalaciones</td>
                                    <td>23/03/2023</td>
                                    <td>asociado@gmail.com</td>
                                    <td>
                                        <button class="btn btn-primary btn-editar">Editar</button>
                                        <button class="btn btn-danger btn-eliminar">Eliminar</button>
                                    </td>

                                </tr>
                                <tr>

                                    <td>Cargas de trabajo</td>
                                    <td>23/03/2023</td>
                                    <td>asociado@gmail.com</td>
                                    <td>
                                        <button class="btn btn-primary btn-editar">Editar</button>
                                        <button class="btn btn-danger btn-eliminar">Eliminar</button>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

</body>

</html>