$("#buttonSign").click(function () {
    let correo = $("#inputEmail").val();
    let password = $("#inputPassword").val();
    let obj = {
        "accion": "login",
        "mail": correo,
        "password": password,
    };
    $.post("includes/_funciones.php", obj, function (r) {
        if (r == 2) {
            $("#error").html("Campos vacios").fadeIn();
        }
        if (r == 0) {
            $("#error").html("Usuario o contraseña incorrectos").fadeIn();
        }
        if (r == 1) {
            window.location.href = "usuarios.php";
        }

    });
});