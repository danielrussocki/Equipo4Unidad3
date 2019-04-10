<?php

include_once("_db.php");

switch ($_POST["accion"]) {
	case 'login':
		login();
		break;
	case 'kill_session':
		kill_session();
		break;
	case 'carga_foto':
		carga_foto();
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

		//CLIENTS
	case 'consultar_clients':
		consultar_clients();
		break;
	case 'consultar_client':
		consultar_client($_POST['id']);
		break;
	case 'insertar_client':
		insertar_client();
		break;
	case 'editar_client':
		editar_client();
		break;
	case 'eliminar_client':
		eliminar_client($_POST['id']);
		break;

	case 'consultar_clientimg':
		consultar_clientimg();
		break;
	case 'eliminar_clientimg':
		eliminar_clientimg($_POST['id']);
		break;

	case 'consultar_workimg':
		consultar_workimg();
		break;
	case 'eliminar_workimg':
		eliminar_workimg($_POST['id']);
		break;

	default:
		break;
}
function carga_foto()
{
	if (isset($_FILES["foto"])) {
		$file = $_FILES["foto"];
		$nombre = $_FILES["foto"]["name"];
		$temporal = $_FILES["foto"]["tmp_name"];
		$tipo = $_FILES["foto"]["type"];
		$tam = $_FILES["foto"]["size"];
		$dir = "../img/upload/";
		$respuesta = [
			"archivo" => "/img/team4-logo.png",
			"status" => 0
		];
		if (move_uploaded_file($temporal, $dir . $nombre)) {
			$respuesta["archivo"] = "img/upload/" . $nombre;
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

function kill_session()
{
	session_start();
	error_reporting(0);
	session_destroy();
	echo "index.html";
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
	$query = "SELECT * FROM works WHERE works_id = $id";
	$res = $mysqli->query($query);
	$fila = mysqli_fetch_array($res);
	echo json_encode($fila); //Imprime Json encodeado	
}

function insertar_work()
{
	global $mysqli;
	$titulo = $_POST["titulo"];
	$descripcion = $_POST["descripcion"];
	$tab1 = $_POST["tab1"];
	$tab2 = $_POST["tab2"];
	$tab3 = $_POST["tab3"];

	if (empty($titulo) && empty($descripcion) && empty($tab1) && empty($tab2) && empty($tab3)) {
		echo "0";
	} elseif (empty($titulo)) {
		echo "0";
	} elseif (empty($descripcion)) {
		echo "0";
	} elseif (empty($tab1)) {
		echo "0";
	} elseif (empty($tab2)) {
		echo "0";
	} elseif (empty($tab3)) {
		echo "0";
	} else {
		$query = "INSERT INTO works VALUES ('','$titulo','$descripcion','$tab1', '$tab2', '$tab3')";
		$res = mysqli_query($mysqli, $query);
		echo "1";
	}
}

function editar_work()
{
	global $mysqli;
	extract($_POST);
	$query = "UPDATE works SET works_title = '$titulo', works_description = '$descripcion', works_tab1 = '$tab1', works_tab2 = '$tab2', works_tab3 = '$tab3'
	WHERE works_id = '$id'";
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
	$query = "DELETE FROM works WHERE works_id = $id";
	$res = $mysqli->query($query);
	if ($res) {
		echo "1";
	} else {
		echo "0";
	}
}


//TESTIMONIAL

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
	$query = "SELECT * FROM testimonials WHERE test_id = $id";
	$res = $mysqli->query($query);
	$fila = mysqli_fetch_array($res);
	echo json_encode($fila); //Imprime Json encodeado	
}

function insertar_testimonial()
{
	global $mysqli;
	$description = $_POST["description"];
	$quote = $_POST["quote"];
	$logo = $_POST["ruta"];
	$name = $_POST["name"];
	$puesto = $_POST["puesto"];

	if (empty($description) && empty($quote) && empty($logo) && empty($name)  && empty($puesto)) {
		echo "0";
	} elseif (empty($description)) {
		echo "0";
	} elseif (empty($quote)) {
		echo "0";
	} elseif (empty($logo)) {
		echo "0";
	} elseif (empty($name)) {
		echo "0";
	} elseif (empty($puesto)) {
		echo "0";
	} else {
		$query = "INSERT INTO testimonials VALUES ('','$description','$quote','$logo', '$name', '$puesto')";
		$res = mysqli_query($mysqli, $query);
		echo "1";
	}
}

function editar_testimonial()
{
	global $mysqli;
	extract($_POST);
	$query = "UPDATE testimonials SET test_description = '$description', test_quote = '$quote', test_img = '$ruta', test_name = '$name', test_puesto = '$puesto'
	WHERE test_id = '$id'";
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
	$query = "DELETE FROM testimonials WHERE test_id = $id";
	$res = $mysqli->query($query);
	if ($res) {
		echo "1";
	} else {
		echo "0";
	}
}

//CLIENTS
function consultar_clients()
{
	global $mysqli;
	$query = "SELECT * FROM clients";
	$res = mysqli_query($mysqli, $query);
	$arreglo = [];
	while ($fila = mysqli_fetch_array($res)) {
		array_push($arreglo, $fila);
	}
	echo json_encode($arreglo); //Imprime el JSON ENCODEADO
}

function consultar_client($id)
{
	global $mysqli;
	$query = "SELECT * FROM clients WHERE client_id = $id";
	$res = $mysqli->query($query);
	$fila = mysqli_fetch_array($res);
	echo json_encode($fila); //Imprime Json encodeado	
}

function insertar_client()
{
	global $mysqli;
	$title = $_POST["titulo"];
	$description = $_POST["descripcion"];
	if (empty($title) && empty($description)) {
		echo "0";
	} elseif (empty($title)) {
		echo "0";
	} elseif (empty($description)) {
		echo "0";
	} else {
		$query = "INSERT INTO clients VALUES ('','$title','$description')";
		$res = mysqli_query($mysqli, $query);
		echo "1";
	}
}

function editar_client()
{
	global $mysqli;
	extract($_POST);
	$query = "UPDATE clients SET client_title = '$titulo', client_description = '$descripcion'
	WHERE client_id = '$id'";
	$res = $mysqli->query($query);
	if ($res) {
		echo "1";
	} else {
		echo "0";
	}
}

function eliminar_client($id)
{
	global $mysqli;
	$query = "DELETE FROM clients WHERE client_id = $id";
	$res = $mysqli->query($query);
	if ($res) {
		echo "1";
	} else {
		echo "0";
	}
}


////
function consultar_clientimg()
{
	global $mysqli;
	$query = "SELECT * FROM clients_img";
	$res = mysqli_query($mysqli, $query);
	$arreglo = [];
	while ($fila = mysqli_fetch_array($res)) {
		array_push($arreglo, $fila);
	}
	echo json_encode($arreglo); //Imprime el JSON ENCODEADO
}

function eliminar_clientimg($id)
{
	global $mysqli;
	$query = "DELETE FROM clients_img WHERE clientimg_id = $id";
	$res = $mysqli->query($query);
	if ($res) {
		echo "1";
	} else {
		echo "0";
	}
}

function consultar_workimg()
{
	global $mysqli;
	$query = "SELECT * FROM works_img";
	$res = mysqli_query($mysqli, $query);
	$arreglo = [];
	while ($fila = mysqli_fetch_array($res)) {
		array_push($arreglo, $fila);
	}
	echo json_encode($arreglo); //Imprime el JSON ENCODEADO
}

function eliminar_workimg($id)
{
	global $mysqli;
	$query = "DELETE FROM works_img WHERE worksimg_id = $id";
	$res = $mysqli->query($query);
	if ($res) {
		echo "1";
	} else {
		echo "0";
	}
}