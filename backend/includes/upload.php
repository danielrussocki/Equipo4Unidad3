<?php
include_once("_db.php");
switch ($_POST["type"]) {
    case 'imgworks':
		imgworks();
        break;
	case 'imgclients':
		imgclients();
		break;
	default:
		break;
}

function imgworks(){
    global $mysqli;

    //Como el elemento es un arreglos utilizamos foreach para extraer todos los valores
	foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
	{
		//Validamos que el archivo exista
		if($_FILES["archivo"]["name"][$key]) {
			$filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
			$source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
			
			$directorio = '../img/upload'; //Declaramos un  variable con la ruta donde guardaremos los archivos
			
			//Validamos si la ruta de destino existe, en caso de no existir la creamos
			if(!file_exists($directorio)){
				mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");	
			}
			
			$dir=opendir($directorio); //Abrimos el directorio de destino
            $target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
            $finalpath = substr($target_path, 3);  

            $query = "INSERT INTO works_img (worksimg_id, worksimg_route)  VALUES ('','$finalpath')";
            $res = mysqli_query($mysqli, $query);
            if ($res) {
                header("Location:../imgworks.php");
            } else {
                echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
                
            }
			
			//Movemos y validamos que el archivo se haya cargado correctamente
			//El primer campo es el origen y el segundo el destino
			
            closedir($dir); //Cerramos el directorio de destino
		}
	}
}
function imgclients(){
    global $mysqli;

    //Como el elemento es un arreglos utilizamos foreach para extraer todos los valores
	foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
	{
		//Validamos que el archivo exista
		if($_FILES["archivo"]["name"][$key]) {
			$filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
			$source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
			
			$directorio = '../img/upload'; //Declaramos un  variable con la ruta donde guardaremos los archivos
			
			//Validamos si la ruta de destino existe, en caso de no existir la creamos
			if(!file_exists($directorio)){
				mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");	
			}
			
			$dir=opendir($directorio); //Abrimos el directorio de destino
            $target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
            
            $finalpath = substr($target_path, 3);  

            $query = "INSERT INTO clients_img (clientimg_id, clientimg_rute)  VALUES ('','$finalpath')";
		    $res = mysqli_query($mysqli, $query);
			
			//Movemos y validamos que el archivo se haya cargado correctamente
			//El primer campo es el origen y el segundo el destino
			if(move_uploaded_file($source, $target_path)) {	
				header("Location:../imgclients.php");
				} else {	
				echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
			}
            closedir($dir); //Cerramos el directorio de destino
		}
	}
}
?>