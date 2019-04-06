<?php
$server = "localhost";
$db = "artis";
$user = "root";
$password = "";

$mysqli = mysqli_connect($server, $user, $password, $db);
if ($mysqli -> connect_errno) {
    echo "Lo sentimos, este sitio web está experimentando problemas.";
    echo "Error: Fallo al conectarse a MySQL debido a: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    exit;
}
?>