<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Sesion</title>
    <link rel="stylesheet" type="text/css" href="{{ asset ('css/login.css') }}">
</head>
<body>
    <header>
        <h1>PROMOPLAST SAS</h1>
        <a href="index.html" class="btn-ingresar" ><img class="img-login" src="PICTURES/icons8-atrás-64.png" alt="ingresar"></a>
        <h1>INICIO DE SESION</h1>
    </header>
    <div class="box-content">
        <form action="dashboard.html" class="flex-box needs-validation">
            <img class="imglogin" src="./PICTURES/logo.png" alt="Esta imagen no se puede visualizar">
            <div class="form-group">
                <input type="email" id="Correo" placeholder="Correo" required>                
            </div>
            <div class="form-group was-validated">
                <input type="password" id="password" placeholder="Contraseña" required  >
            </div>
            <div class="form-group ">
                <input type="checkbox" id="check">
                <label for="check">Recordar</label>
            </div>
            <button type="submit">
                Ingresar
            </button><a href="formulario.html">Registrarse</a>
            <a href="">¿Olvidaste tu Contraseña?</a>           
        </form>
    </div>
</body> 
</html>