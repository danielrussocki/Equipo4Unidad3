<?php
require_once '_db.php';
switch($_POST["accion"]){
    case "login":
    login();
    break;
}
function login(){
    global $mysqli;
    $usu = $_POST["usuario"];
    $usu = mysqli_real_escape_string($mysqli,$usu);
    $pass = $_POST["password"];
    $pass = mysqli_real_escape_string($mysqli,$pass);
    $num = 0;
    if($usu==''||$pass==''){
        $num=3;
    } else {
        $query="SELECT * FROM usuarios WHERE correo_usr = '$usu'";
        $result = $mysqli->query($query);
        if($result->num_rows==0){
            $num = 2;
        } else {
            $query2 = "SELECT * FROM usuarios WHERE correo_usr = '$usu' AND password_usr = '$pass'";
            $result2 = $mysqli->query($query2);
            if($result2->num_rows>0){
                $num = 1;
                session_start();
                error_reporting(0);
                $_SESSION['access'] = $usu;
            } elseif($result2->num_rows == 0){
                $num = 0;
            }
        }
    }
    imprimir($num);
}
function imprimir($n){
    switch($n){
        case 0:
        echo "Contraseña incorrecta - 0";
        break;
        case 1:
        echo "Acceso permitido - 1";
        break;
        case 2:
        echo "El usuario no existe - 2";
        break;
        case 3:
        echo "Favor de llenar los campos - 3";
        break;
        default:
        break;
    }
}
?>