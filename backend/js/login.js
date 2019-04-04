$(document).ready(function(){
    let h = $(window).height();
    $('body').height(h);
});
$('#btnSign').click(function(){
    let correo = $('#inputUser').val();
    let password = $('#inputPassword').val();
    let obj = {
        "accion":"login",
        "usuario":correo,
        "password":password
    };
    $.post('includes/_funciones.php',obj,function(e){
        if(e=="Acceso permitido - 1"){
            window.location.href = "usuarios.php";
        } else {
            alert(e);
        }
    });
});