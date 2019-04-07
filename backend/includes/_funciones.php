<?php 
include_once("_db.php");
switch ($_POST["accion"]) {
	case 'login':
		login();
		break;
	case 'consultar_usuarios':
		consultar_usuarios();
		break;
	case 'consultar_usuario':
		consultar_usuario($_POST['id']);
		break;
	case 'editar_usuario':
		editar_usuario();
		break;
	case 'insertar_usuario':
		insertar_usuario();
		break;
	case 'eliminar_usuario':
		eliminar_usuario($_POST['id']);
		break;
	case 'carga_foto':
		carga_foto();
		break;
		//Works
	case 'consultar_works':
		consultar_works();
		break;
	case 'consultar_work':
		consultar_work($_POST['id']);
		break;
	case 'insertar_work':
		insertar_work();
		break;
	case 'editar_work':
		editar_work();
		break;
	case 'eliminar_work':
		eliminar_work($_POST['id']);
		break;
		//TESTIMONIAL
	case 'consultar_testimonials':
		consultar_testimonials();
		break;
	case 'consultar_testimonial':
		consultar_testimonial($_POST['id']);
		break;
	case 'insertar_testimonial':
		insertar_testimonial();
		break;
	case 'editar_testimonial':
		editar_testimonial();
		break;
	case 'eliminar_testimonial':
		eliminar_testimonial($_POST['id']);
		break;
    case 'kill_session':
        kill_session();
        break;
    case 'consultar_headers':
        consultar_headers();
		break;
	case 'consultar_header':
		consultar_header($_POST['id']);
		break;
	case 'insertar_header':
		insertar_header();
		break;
	case 'editar_header':
		editar_header();
		break;
	case 'eliminar_header':
		eliminar_header($_POST['id']);
		break;
	default:
		break;
}
function carga_foto(){
	if (isset($_FILES["foto"])) {
		$file = $_FILES["foto"];
		$nombre = $_FILES["foto"]["name"];
		$temporal = $_FILES["foto"]["tmp_name"];
		$tipo = $_FILES["foto"]["type"];
		$tam = $_FILES["foto"]["size"];
		$dir = "../img/upload/";
		$respuesta = [
			"archivo" => "img/logo.png",
			"status" => 0
		];
		if(move_uploaded_file($temporal, $dir.$nombre)){
			$respuesta["archivo"] = "img/upload/".$nombre;
			$respuesta["status"] = 1;
		}
		echo json_encode($respuesta);
	}
}
function login()
{
	global $mysqli;
	$mail = $_POST["mail"];
	$pass = $_POST["password"];
	if (empty($mail) && empty($pass)) {
		//empty boxes
		echo "2";
	} else {
		$query = "SELECT * FROM usuarios WHERE correo_usr = '$mail'";
		$res = $mysqli->query($query);
		$row = $res->fetch_assoc();
		if ($row == 0) {
			//Correo no existe
			echo "0";
		} else {
			$query = "SELECT * FROM usuarios WHERE correo_usr = '$mail' AND password_usr = '$pass'";
			$res = $mysqli->query($query);
			$row = mysqli_fetch_array($res);
			//Si el password no es correcto, imprimir 0
			if ($row["password_usr"] != $pass) {
				echo "0";
				//Si el usuario es correcto, imprimir 1
			} elseif ($mail == $row["correo_usr"] && $pass == $row["password_usr"]) {
				echo "1";
				session_start();
				error_reporting(0);
				$_SESSION['auth'] = $mail;
			}
		}
	}
}
function consultar_usuarios()
{
	global $mysqli;
	$query = "SELECT * FROM usuarios";
	$res = mysqli_query($mysqli, $query);
	$arreglo = [];
	while ($fila = mysqli_fetch_array($res)) {
		array_push($arreglo, $fila);
	}
	echo json_encode($arreglo); //Imprime el JSON ENCODEADO
}
function insertar_usuario()
{
	global $mysqli;
	$nombre = $_POST["nombre"];
	$tel = $_POST["telefono"];
	$mail = $_POST["correo"];
	$pass = $_POST["password"];
	if (empty($nombre) && empty($mail) && empty($tel) && empty($pass)) {
		echo "0";
	} elseif (empty($nombre)) {
		echo "0";
	} elseif (empty($mail)) {
		echo "0";
	} elseif (empty($tel)) {
		echo "0";
	} elseif (empty($pass)) {
		echo "0";
	} else {
		$query = "INSERT INTO usuarios (id_usr, correo_usr, password_usr, nombre_usr, telefono_usr)  VALUES ('','$mail','$pass','$nombre','$tel')";
		$res = mysqli_query($mysqli, $query);
		echo "1";
	}
}
function eliminar_usuario($id)
{
	global $mysqli;
	$query = "DELETE FROM usuarios WHERE id_usr = $id";
	$res = $mysqli->query($query);
	if ($res) {
		echo "1";
	} else {
		echo "0";
	}
}
function consultar_usuario($id)
{
	global $mysqli;
	$query = "SELECT * FROM usuarios WHERE id_usr = '$id'";
	$res = $mysqli->query($query);
	$fila = mysqli_fetch_array($res);
	echo json_encode($fila); //Imprime Json encodeado	
}
function editar_usuario()
{
	global $mysqli;
	extract($_POST);
	$query = "UPDATE usuarios SET correo_usr = '$correo', password_usr = '$password', nombre_usr = '$nombre', telefono_usr = '$telefono'
	WHERE id_usr = '$id'";
	$res = $mysqli->query($query);
	if ($res) {
		echo "1";
	} else {
		echo "0";
	}
}
//WORKS PART
function consultar_works()
{
	global $mysqli;
	$query = "SELECT * FROM works";
	$res = mysqli_query($mysqli, $query);
	$arreglo = [];
	while ($fila = mysqli_fetch_array($res)) {
		array_push($arreglo, $fila);
	}
	echo json_encode($arreglo); //Imprime el JSON ENCODEADO
}
function consultar_work($id)
{
	global $mysqli;
	$query = "SELECT * FROM works WHERE id = $id";
	$res = $mysqli->query($query);
	$fila = mysqli_fetch_array($res);
	echo json_encode($fila); //Imprime Json encodeado	
}
function insertar_work()
{  
	global $mysqli;
	$work_name = $_POST["work_name"];
	$work_description = $_POST["work_description"];
	$work_img = $_POST["work_img"];
	if (empty($work_name) && empty($work_description) && empty($work_img)) {
		echo "0";
	} elseif (empty($work_name)) {
		echo "0";
	} elseif (empty($work_description)) {
		echo "0";
	} elseif (empty($work_img)) {
		echo "0";
	} else {
		$query = "INSERT INTO works VALUES ('','$work_name','$work_description','$work_img')";
		$res = mysqli_query($mysqli, $query);
		echo "1";
	}
}
function editar_work()
{
	global $mysqli;
	extract($_POST);
	$query = "UPDATE works SET work_name = '$work_name', work_description = '$work_description', work_img = '$work_img'
	WHERE id = '$id'";
	$res = $mysqli->query($query);
	if ($res) {
		echo "1";
	} else {
		echo "0";
	}
}
function eliminar_work($id)
{
	global $mysqli;
	$query = "DELETE FROM works WHERE id = $id";
	$res = $mysqli->query($query);
	if ($res) {
		echo "1";
	} else {
		echo "0";
	}
}
//TESTIMONIAL PART
function consultar_testimonials()
{
	global $mysqli;
	$query = "SELECT * FROM testimonials";
	$res = mysqli_query($mysqli, $query);
	$arreglo = [];
	while ($fila = mysqli_fetch_array($res)) {
		array_push($arreglo, $fila);
	}
	echo json_encode($arreglo); //Imprime el JSON ENCODEADO
}
function consultar_testimonial($id)
{
	global $mysqli;
	$query = "SELECT * FROM testimonials WHERE id = $id";
	$res = $mysqli->query($query);
	$fila = mysqli_fetch_array($res);
	echo json_encode($fila); //Imprime Json encodeado	
}
function insertar_testimonial()
{  
	global $mysqli;
	$description = $_POST["description"];
	$quote = $_POST["quote"];
	$img = $_POST["img"];
	$name = $_POST["name"];
	$puesto = $_POST["puesto"];
	
	if (empty($description) && empty($quote) && empty($img) && empty($name)  && empty($puesto)) {
		echo "0";
	} elseif (empty($description)) {
		echo "0";
	} elseif (empty($quote)) {
		echo "0";
	} elseif (empty($img)) {
		echo "0";
	} elseif (empty($name)) {
		echo "0";
	} elseif (empty($puesto)) {
		echo "0";
	} else {
		$query = "INSERT INTO testimonials VALUES ('','$description','$quote','$img', '$name', '$puesto')";
		$res = mysqli_query($mysqli, $query);
		echo "1";
	}
}
function editar_testimonial()
{
	global $mysqli;
	extract($_POST);
	$query = "UPDATE testimonials SET description = '$description', quote = '$quote', img = '$img', name = '$name', puesto = '$puesto'
	WHERE id = '$id'";
	$res = $mysqli->query($query);
	if ($res) {
		echo "1";
	} else {
		echo "0";
	}
}
function eliminar_testimonial($id)
{
	global $mysqli;
	$query = "DELETE FROM testimonials WHERE id = $id";
	$res = $mysqli->query($query);
	if ($res) {
		echo "1";
	} else {
		echo "0";
	}
}
function consultar_headers(){
    global $mysqli;
    $query = "SELECT * FROM header";
    $respuesta = mysqli_query($mysqli, $query);
    $arreglo = [];
    while ($fila = mysqli_fetch_array($respuesta)) {        
        array_push($arreglo, $fila);
    }
	echo json_encode($arreglo);
}
function consultar_header($id){
	global $mysqli;
	$query = "SELECT * FROM header WHERE header_id = '$id'";
	$respuesta = $mysqli->query($query);
	$fila = mysqli_fetch_array($respuesta);
	echo json_encode($fila);
}
function kill_session(){
    session_start();
	error_reporting(0);
	session_destroy();
	echo "index.php";
}
function insertar_header(){
    global $mysqli;
    $title=$_POST['title'];$text_btn=$_POST['text_btn'];
    $header_href=$_POST['header_href'];$file=$_POST['file'];
    $query = "INSERT INTO header VALUES('','$file','$title','$text_btn','$header_href')";
	$mysqli->query($query);
	if(empty($title)||empty($header_href)||empty($text_btn)||empty($file)){
		echo "0";
	}
	echo "1";
}
function editar_header(){
	global $mysqli;
	extract($_POST);
	$query = "UPDATE header SET header_background = '$file', header_title = '$title', header_button = '$text_btn', header_href = '$header_href' WHERE header_id = $id";
	$respuesta = $mysqli->query($query);
	if($respuesta){
		echo "1";
	} else {
		echo "0";
	}
}
function eliminar_header($id){
	global $mysqli;
	$query = "DELETE FROM header WHERE header_id = '$id'";
	$respuesta = $mysqli->query($query);
	if($respuesta){
		echo "1";
	}else{
		echo "0";
	}
}
?>