<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="{{ asset('CSS/Style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('CSS/buzon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('CSS/Header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('CSS/footer.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('CSS/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('CSS/estilos-dash-admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <script src="{{ asset('JS/bootstrap.bundle.min.js') }}"></script>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="shortcut icon" href="{{ asset('PICTURES/iconlogo.png') }}">
    <title>PromoPlast | Buzón de sugerencias</title>
</head>

<body>
    <header class="dash-menu">
        <img class="logo-dash-admin" src="{{ asset('PICTURES/logo.png') }}" alt="logo">
        <a href="index.html" class="btn">HOME</a>
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

            <div class="Formulario">
                <form action="/action_page.php">

                    <label for="fname"><br>Nombre de Categoría</label>
                    <input type="text" id="fname" name="firstname" placeholder="Nombre Categoría">

                    <p></p>

                    <label for="lname">E-mail asociado a la Categoría</label>
                    <input type="email" id="lname" name="lastname" placeholder="Correo electronico asociado">

                    <input type="submit" value="Guardar">
                    <input type="button" value="Cancelar">

                </form>
            </div>
        </div>
    </div>
    </div>

</body>

</html>
agregarc.txt
Mostrando agregarc.txt.