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
	$mail = $_POST["correo"];
	$pass = $_POST["password"];

	if (empty($mail) && empty($pass)) {
		//empty boxes
		echo "2";
	} else {
		$query = "SELECT * FROM usuarios WHERE correo = '$mail'";
		$res = $mysqli->query($query);
		$row = $res->fetch_assoc();
		if ($row == 0) {
			//Correo no existe
			echo "0";
		} else {
			$query = "SELECT * FROM usuarios WHERE correo = '$mail' AND password = '$pass'";
			$res = $mysqli->query($query);
			$row = mysqli_fetch_array($res);
			//Si el password no es correcto, imprimir 0
			if ($row["password"] != $pass) {
				echo "0";
				//Si el usuario es correcto, imprimir 1
			} elseif ($mail == $row["correo"] && $pass == $row["password"]) {
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

		$query = "INSERT INTO usuarios (id, correo, password, nombre, telefono)  VALUES ('','$mail','$pass','$nombre','$tel')";
		$res = mysqli_query($mysqli, $query);
		echo "1";
	}
}

function eliminar_usuario($id)
{
	global $mysqli;
	$query = "DELETE FROM usuarios WHERE id = $id";
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
	$query = "SELECT * FROM usuarios WHERE id = $id";
	$res = $mysqli->query($query);
	$fila = mysqli_fetch_array($res);
	echo json_encode($fila); //Imprime Json encodeado	
}

function editar_usuario()
{
	global $mysqli;
	extract($_POST);
	$query = "UPDATE usuarios SET correo = '$correo', password = '$password', nombre = '$nombre', telefono = '$telefono'
	WHERE id = '$id'";
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
