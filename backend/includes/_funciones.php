<?php 
require_once("_db.php");
switch ($_POST["accion"]) {

	//WHAT WE DO
	case 'consultar_wwd':
	consultar_wwd();
	break;
	case 'insertar_wwd':
	insertar_wwd();
	break;
	case 'editar_wwd':
		editar_wwd($_POST["id"]);
	break;
	case 'editar_registro_wwd':
		 editar_registro_wwd($_POST["id"]);
	break;
	case 'eliminar_registro_wwd':
		eliminar_wwd($_POST["id"]);
	break;
	case 'carga_foto_wwd':
	carga_foto();
	break;
	//MEET THE TEAM
	case 'consultar_mtt':
	consultar_mtt();
	break;
	case 'insertar_mtt':
	insertar_mtt();
	break;
	case 'editar_mtt':
		editar_mtt($_POST["id"]);
	break;
	case 'editar_registro_mtt':
		editar_registro_mtt($_POST["id"]);
	break;
	case 'eliminar_registro_mtt':
		eliminar_mtt($_POST["id"]);
	break;
	case 'carga_foto_mtt':
	carga_foto();
	break;
		//FOOTER parte2
	case 'consultar_f2':
	consultar_f2();
	break;
	case 'insertar_f2':
	insertar_f2();
	break;
	case 'editar_f2':
		editar_f2($_POST["id"]);
	break;
	case 'editar_registro_f2':
		 editar_registro_f2($_POST["id"]);
	break;
	case 'eliminar_registro_f2':
		eliminar_f2($_POST["id"]);
	break;
	case 'carga_foto_f2':
	carga_foto();
	break;
	default:
	break;
}

//What We Do
function consultar_wwd(){
	global $mysqli;
	$consulta = "SELECT * FROM wwd";
	$resultado = mysqli_query($mysqli, $consulta);
	$arreglo = [];
	while($fila = mysqli_fetch_array($resultado)){
		array_push($arreglo, $fila);
	}
	echo json_encode($arreglo); 
}


function insertar_wwd(){
	global $mysqli;
	$titulo = $_POST["titulo"];
	$subtitulo = $_POST["subtitulo"];	
	$img= $_POST["img"];	
	$img_titulo = $_POST["img_titulo"];	
	$img_sub=$_POST["img_sub"];
	$boton=$_POST["boton"];
	$consul1 = "INSERT INTO wwd VALUES('','$titulo','$subtitulo','$img', '$img_titulo', '$img_sub', '$boton')";
	$resul1 = mysqli_query($mysqli, $consul1);
		echo "Se inserto el usuario en la BD ";
		
}

function editar_wwd($id){
	global $mysqli;
    $titulo = $_POST["titulo"];
	$subtitulo = $_POST["subtitulo"];	
	$img= $_POST["img"];	
	$img_titulo = $_POST["img_titulo"];	
	$img_sub=$_POST["img_sub"];
	$boton=$_POST["boton"];	
	$consulta = "UPDATE wwd SET titulo_wwd = '$titulo', subtitulo_wwd = '$subtitulo', img_wwd = '$img', titulo_img_wwd = '$img_titulo', subtitu_img_wwd ='$img_sub', bton_wwd ='$boton' WHERE id_wwd = $id";
	$resultado = mysqli_query($mysqli, $consulta);
    echo "Se edito el usuario correctamente";

}
function editar_registro_wwd($id){
    global $mysqli;
    $consulta = "SELECT * FROM wwd WHERE id_wwd = '$id'";
    $resultado = mysqli_query($mysqli,$consulta);
    
    $fila = mysqli_fetch_array($resultado);
    echo json_encode($fila);
  }

function eliminar_wwd($id){
	global $mysqli;
	$consulta = "DELETE FROM wwd WHERE id_wwd =$id";
	$resultado = mysqli_query($mysqli, $consulta);
	if ($resultado) {
		echo "Se elmino correctamete";
	}else{
		echo "Se genero un error intenta nuevamente";
	}
}




function carga_foto_wwd(){
	if (isset($_FILES["foto"])) {
		$file = $_FILES["foto"];
		$nombre = $_FILES["foto"]["name"];
		$temporal = $_FILES["foto"]["tmp_name"];
		$tipo = $_FILES["foto"]["type"];
		$tam = $_FILES["foto"]["size"];
		$dir = "../img/logotipo.png/";
		$respuesta = [
			"archivo" => "img/logotipo.png",
			"status" => 0
		];
		if(move_uploaded_file($temporal, $dir.$nombre)){
			$respuesta["archivo"] = "img/logotipo.png/".$nombre;
			$respuesta["status"] = 1;
		}
		echo json_encode($respuesta);
	}
}

//Meet The Team
function consultar_mtt(){
	global $mysqli;
	$consulta = "SELECT * FROM mtt";
	$resultado = mysqli_query($mysqli, $consulta);
	$arreglo = [];
	while($fila = mysqli_fetch_array($resultado)){
		array_push($arreglo, $fila);
	}
	echo json_encode($arreglo); 
}


function insertar_mtt(){
	global $mysqli;
	$titulo = $_POST["titulo"];
	$subtitulo = $_POST["subtitulo"];	
	$img= $_POST["img"];	
	$img_titulo = $_POST["img_titulo"];	

	$consul1 = "INSERT INTO mtt VALUES('','$titulo','$subtitulo','$img', '$img_titulo')";
	$resul1 = mysqli_query($mysqli, $consul1);
		echo "Se inserto el usuario en la BD ";
		
}

function editar_mtt($id){
	global $mysqli;
    $titulo = $_POST["titulo"];
	$subtitulo = $_POST["subtitulo"];	
	$img= $_POST["img"];	
	$img_titulo = $_POST["img_titulo"];	

	$consulta = "UPDATE mtt SET titulo_mtt = '$titulo', subtitulo_mtt = '$subtitulo', img_mtt = '$img', titulo_img_mtt = '$img_titulo' WHERE id_mtt = $id";
	$resultado = mysqli_query($mysqli, $consulta);
    echo "Se edito el usuario correctamente";

}
function editar_registro_mtt($id){
    global $mysqli;
    $consulta = "SELECT * FROM mtt WHERE id_mtt = '$id'";
    $resultado = mysqli_query($mysqli,$consulta);
    
    $fila = mysqli_fetch_array($resultado);
    echo json_encode($fila);
  }

function eliminar_mtt($id){
	global $mysqli;
	$consulta = "DELETE FROM mtt WHERE id_mtt =$id";
	$resultado = mysqli_query($mysqli, $consulta);
	if ($resultado) {
		echo "Se elmino correctamete";
	}else{
		echo "Se genero un error intenta nuevamente";
	}
}




function carga_foto_mtt(){
	if (isset($_FILES["foto"])) {
		$file = $_FILES["foto"];
		$nombre = $_FILES["foto"]["name"];
		$temporal = $_FILES["foto"]["tmp_name"];
		$tipo = $_FILES["foto"]["type"];
		$tam = $_FILES["foto"]["size"];
		$dir = "../img/logotipo.png/";
		$respuesta = [
			"archivo" => "img/logotipo.png",
			"status" => 0
		];
		if(move_uploaded_file($temporal, $dir.$nombre)){
			$respuesta["archivo"] = "img/logotipo.png/".$nombre;
			$respuesta["status"] = 1;
		}
		echo json_encode($respuesta);
	}
}

//FOOTER PARTE 2
function consultar_f2(){
	global $mysqli;
	$consulta = "SELECT * FROM footer2";
	$resultado = mysqli_query($mysqli, $consulta);
	$arreglo = [];
	while($fila = mysqli_fetch_array($resultado)){
		array_push($arreglo, $fila);
	}
	echo json_encode($arreglo); 
}


function insertar_f2(){
	global $mysqli;
	$titulo = $_POST["titulo"];	
	$img= $_POST["img"];	
	

	$consul1 = "INSERT INTO footer2 VALUES('','$titulo','$img')";
	$resul1 = mysqli_query($mysqli, $consul1);
		echo "Se inserto el usuario en la BD ";
		
}

function editar_f2($id){
	global $mysqli;
    $titulo = $_POST["titulo"];
	$img= $_POST["img"];	


	$consulta = "UPDATE footer2 SET titulo_f2 = '$titulo', img_f2 = '$img' WHERE id_f2 = $id";
	$resultado = mysqli_query($mysqli, $consulta);
    echo "Se edito el usuario correctamente";

}
function editar_registro_f2($id){
    global $mysqli;
    $consulta = "SELECT * FROM footer2 WHERE id_f2 = '$id'";
    $resultado = mysqli_query($mysqli,$consulta);
    
    $fila = mysqli_fetch_array($resultado);
    echo json_encode($fila);
  }

function eliminar_f2($id){
	global $mysqli;
	$consulta = "DELETE FROM footer2 WHERE id_f2 =$id";
	$resultado = mysqli_query($mysqli, $consulta);
	if ($resultado) {
		echo "Se elmino correctamete";
	}else{
		echo "Se genero un error intenta nuevamente";
	}
}




function carga_foto_f2(){
	if (isset($_FILES["foto"])) {
		$file = $_FILES["foto"];
		$nombre = $_FILES["foto"]["name"];
		$temporal = $_FILES["foto"]["tmp_name"];
		$tipo = $_FILES["foto"]["type"];
		$tam = $_FILES["foto"]["size"];
		$dir = "../img/logotipo.png/";
		$respuesta = [
			"archivo" => "img/logotipo.png",
			"status" => 0
		];
		if(move_uploaded_file($temporal, $dir.$nombre)){
			$respuesta["archivo"] = "img/logotipo.png/".$nombre;
			$respuesta["status"] = 1;
		}
		echo json_encode($respuesta);
	}
}


?>