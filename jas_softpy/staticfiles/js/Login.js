var usuario;
var password;

function validar(){
    let email=document.getElementById("usuario").value;
    var validarEmail= /^\w+([.-_+]?\w+)*([.-])\w+)*(\.\w{2,10})+$/;

    if(validarEmail.test(email)){
        alert("Correo correcto");
        return true;
    }else{
        alert("Correo incorrecto")
        return false;
    }
}


/*function iniciarSesion(usuario,password){
    let usu=document.getElementById("usuario").value;
    let pass=document.getElementById("password").value;

    if(usu==usuario && pass==password)
    {
        alert("Usuario y contraseña correctos");
    }else{
        alert("Usuario y contraseña incorrecto");
    }

}
*/
