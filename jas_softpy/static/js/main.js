function validarCampos(){
    usuario = document.getElementById('usuario').value;
    password = document.getElementById('contrasena').value;
    
    if (usuario == '' && password == ''){
        alert("Ingresar usuario y contraseña");
    } else{
        if(password == 'admin') {
            alert("Ingreso Exitoso");
        } else {
            alert("Usuario y contraseña erroneos");
        }
    }
    
}