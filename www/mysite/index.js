document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("formulario").addEventListener('submit', validarFormulario); 
});

function validarFormulario(evento){
    evento.preventDefault();
    const email = document.getElementById("f_email").value;
    const contraseña = document.getElementById("f_password").value;
    
    if(email.length == 0) {
        alert("No has especificado el correo electrónico");
        return;
    }
    if(contraseña.length == 0) {
        alert("No has escrito nada en la contraseña");
        return;
    }
    document.getElementById("formulario").submit();
}