<?php
include_once("_db.php");
switch ($_POST["accion"]) {
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
