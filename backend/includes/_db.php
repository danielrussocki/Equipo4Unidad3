<?php
$server = "equipoproyectoweb.com";
$database = "equipop4_unidad3";
$user = "equipop4_admin";
$password = "Proyectounid.2019";

$mysqli = new mysqli($server, $user, $password, $database);
if($mysqli->connect_errno){
    echo "Lo sentimos, este sitio web está experimentando problemas.";
	echo "Error: Fallo al conectarse a MySQL debido a: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    exit;
}
?>