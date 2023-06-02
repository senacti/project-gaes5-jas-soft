<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('CSS/formulario.css') }}">  
  <title>Formulario Registro</title>
</head>
<body>
    <header>
        <h1>PROMOPLAST SAS</h1>
        <h1>REGISTRO</h1>
    </header>
  <section class="form-register">
    <form method="POST" action="{{ route('login') }}">
        @csrf
    <form action="{{ url('dashboard.html') }}">
      <img class="imglogin" src="{{ asset('PICTURES/logo.png') }}" alt="Esta imagen no se puede visualizar">
      <h4>Formulario Registro</h4>
      <input class="controls" type="text" name="nombres" id="nombres" placeholder="Ingrese su Nombre" required maxlength="30" required onkeypress="return soloLetras(event)">
      <input class="controls" type="text" name="apellidos" id="apellidos" placeholder="Ingrese su Apellido" required maxlength="30" required onkeypress="return soloLetras(event)">
      <input class="controls" type="email" name="correo" id="usuario" placeholder="Ingrese su Correo" required>
      <input class="controls" type="password" name="correo" id="correo" placeholder="Ingrese su Contraseña">
      <input type="checkbox" name="" id="">
      <p>Estoy de acuerdo con <a href="{{ url('term_cond.html') }}">Terminos y Condiciones</a></p>
      <button type="submit" onclick="verificar()">
          Ingresar
      </button>
      <p><a href="{{ url('login.html') }}">¿Ya tengo Cuenta?</a></p>
    </form>
    </form>   
  </section>
  <script>
     function soloLetras(e) {
          var key = e.keyCode || e.which,
            tecla = String.fromCharCode(key).toLowerCase(),
            letras = " áéíóúabcdefghijklmnñopqrstuvwxyz",
            especiales = [8, 37, 39, 46],
            tecla_especial = false;
      
          for (var i in especiales) {
            if (key == especiales[i]) {
              tecla_especial = true;
              break;
            }
          }
      
          if (letras.indexOf(tecla) == -1 && !tecla_especial) {
            return false;
          }
        }
  </script>
</body>
</html>
