<?php 
require_once("_db.php");
switch ($_POST["accion"]) {
	case 'login':
	login();
	break;
	//usuarios
	case 'consultar_wwd':
	consultar_wwd();
	break;
	case 'insertar_wwd':
	insertar_wwd();
	break;
	case 'editar_wwd':
		editar_wwd($_POST["id"]);
	break;
	case 'editar_registro':
		editar_registro($_POST["id"]);
	break;
	case 'eliminar_registro':
		eliminar_wwd($_POST["id"]);
	break;
	case 'carga_foto':
	carga_foto();
	break;
	default:
	break;
}

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
function editar_registro($id){
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




function carga_foto(){
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