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
		// CLIENTS
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
		// CLIENT IMG
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
		// HEADER
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
	case 'consultar_footers':
		consultar_footers();
		break;
	case 'insertar_footer':
		insertar_footer();
		break;
	case 'consultar_footer':
		consultar_footer($_POST['id']);
		break;
	case 'editar_footer':
		editar_footer();
		break;
	case 'eliminar_footer':
		eliminar_footer($_POST['id']);
		break;
	case 'form_contact':
		form_contact();
		break;
	case 'consultar_categories':
		consultar_categories();
		break;
	case 'consultar_category':
		consultar_category($_POST['id']);
		break;
	case 'editar_category':
		editar_category();
		break;
	case 'eliminar_category':
		eliminar_category($_POST['id']);
		break;
	case 'insertar_category':
		insertar_category();
		break;
	case 'consultar_contacts':
		consultar_contacts();
		break;
	case 'consultar_contact':
		consultar_contact($_POST['id']);
		break;
	case 'insertar_contact':
		insertar_contact();
		break;
	case 'editar_contact':
		editar_contact();
		break;
	case 'eliminar_contact':
		eliminar_contact($_POST['id']);
		break;
	case 'consultar_form_contacts':
		consultar_form_contacts();
		break;
	case 'consultar_form_contact':
		consultar_form_contact($_POST['id']);
		break;
	case 'insertar_form_contact':
		insertar_form_contact();
		break;
	case 'editar_form_contact':
		editar_form_contact();
		break;
	case 'eliminar_form_contact':
		eliminar_form_contact($_POST['id']);
		break;
		//What we dO
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
function kill_session(){
    session_start();
	error_reporting(0);
	session_destroy();
	echo "index.php";
}
// USUARIOS
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
// CLIENTS
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
// IMG-CLIENT
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
// HEADER
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
function insertar_header(){
    global $mysqli;
    $title=$_POST['title'];$text_btn=$_POST['text_btn'];
	$header_href=$_POST['header_href'];$file=$_POST['file'];
	$ruta = "img/upload/";
	$info = pathinfo($file);
	$file_name = $ruta.$info['basename'];
    $query = "INSERT INTO header VALUES('','$file_name','$title','$text_btn','$header_href')";
	$mysqli->query($query);
	if(empty($title)||empty($header_href)||empty($text_btn)||empty($file)){
		echo "0";
	} else {
		echo "1";
	}
}
function editar_header(){
	global $mysqli;
	extract($_POST);
	$ruta = "img/upload/";
	$info = pathinfo($file);
	$file_name = $ruta.$info['basename'];
	$query = "UPDATE header SET header_background = '$file_name', header_title = '$title', header_button = '$text_btn', header_href = '$header_href' WHERE header_id = $id";
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
function consultar_footers(){
	global $mysqli;
	$query = "SELECT * FROM aboutUs";
	$respuesta = $mysqli->query($query);
	$arreglo = [];
	while($fila=mysqli_fetch_array($respuesta)){
		array_push($arreglo,$fila);
	}
	echo json_encode($arreglo);
}
function insertar_footer(){
	global $mysqli;
	$footer_content = $_POST['footer_content'];
	$query = "INSERT INTO aboutUs VALUES('','$footer_content',0)";	
	if(empty($footer_content)){
		echo "0";
	} else {
		$mysqli->query($query);
		echo "1";
	}
}
function consultar_footer($id){
	global $mysqli;
	$query = "SELECT * FROM aboutUs WHERE footer_id = '$id'";
	$respuesta = $mysqli->query($query);
	$fila = mysqli_fetch_array($respuesta);
	echo json_encode($fila);
}
function editar_footer(){
	global $mysqli;
	extract($_POST);
	$query = "UPDATE aboutUs SET footer_content = '$footer_content' WHERE footer_id = '$id'";
	$respuesta = $mysqli->query($query);
	if($respuesta){
		echo "1";
	} else {
		echo "0";
	}
}
function eliminar_footer($id){
	global $mysqli;
	$query = "DELETE FROM aboutUs WHERE footer_id = '$id'";
	$respuesta = $mysqli->query($query);
	if($respuesta){
		echo "1";
	}else{
		echo "0";
	}
}
function form_contact(){
	global $mysqli;
	extract($_POST);
	$query = "INSERT INTO contactForm VALUES('','$form_name','$form_email','$form_message')";
	if(empty($form_name)||empty($form_email)||empty($form_message)){
		echo "0";
	}else{
		$mysqli->query($query);
		echo "1";
	}
}
function consultar_categories(){
	global $mysqli;
	$query = "SELECT * FROM recentPosts";
	$respuesta = $mysqli->query($query);
	$arreglo = [];
	while($fila = mysqli_fetch_array($respuesta)){
		array_push($arreglo,$fila);
	}
	echo json_encode($arreglo);
}
function consultar_category($id){
	global $mysqli;
	$query = "SELECT * FROM recentPosts WHERE post_id = $id";
	$respuesta = $mysqli->query($query);
	$fila = mysqli_fetch_array($respuesta);
	echo json_encode($fila);
}
function insertar_category(){
	global $mysqli;
	extract($_POST);
	$ruta = "img/upload/";
	$info = pathinfo($file);
	$file_name = $ruta.$info['basename'];
	$query = "INSERT INTO recentPosts VALUES('','$file_name','$title','$category')";
	if(empty($file)||empty($title)||empty($category)){
		echo "0";
	}else{
		$mysqli->query($query);
		echo "1";
	}
}
function eliminar_category($id){
	global $mysqli;
	$query = "DELETE FROM recentPosts WHERE post_id = $id";
	$respuesta = $mysqli->query($query);
	if($respuesta){
		echo "1";
	}else{
		echo "0";
	}
}
function editar_category(){
	global $mysqli;
	extract($_POST);
	$ruta = "img/upload/";
	$info = pathinfo($file);
	$file_name = $ruta.$info['basename'];
	$query = "UPDATE recentPosts SET post_file = '$file_name', post_text = '$title', post_category = '$category' WHERE post_id = $id";
	$respuesta = $mysqli->query($query);
	if($respuesta){
		echo "1";
	} else {
		echo "0";
	}
}
function consultar_contacts(){
	global $mysqli;
	$query = "SELECT * FROM contactUs";
	$respuesta = $mysqli->query($query);
	$arreglo = [];
	while($fila = mysqli_fetch_array($respuesta)){
		array_push($arreglo,$fila);
	}
	echo json_encode($arreglo);
}
function consultar_contact($id){
	global $mysqli;
	$query = "SELECT * FROM contactUs WHERE contact_id = $id";
	$respuesta = $mysqli->query($query);
	$fila = mysqli_fetch_array($respuesta);
	echo json_encode($fila);
}
function insertar_contact(){
	global $mysqli;
	extract($_POST);
	$query = "INSERT INTO contactUs VALUES('','$address','$location','$email','$phone','$fax')";
	if(empty($address)||empty($location)||empty($email)||empty($phone)||empty($fax)){
		echo "0";
	}else{
		$mysqli->query($query);
		echo "1";
	}
}
function editar_contact(){
	global $mysqli;
	extract($_POST);
	$query = "UPDATE contactUs SET contact_address = '$address', contact_location = '$location', contact_email = '$email', contact_phone = '$phone', contact_fax = '$fax' WHERE contact_id = $id";
	$respuesta = $mysqli->query($query);
	if($respuesta){
		echo "1";
	}else{
		echo "0";
	}
}
function eliminar_contact($id){
	global $mysqli;
	$query = "DELETE FROM contactUs WHERE contact_id = $id";
	$respuesta = $mysqli->query($query);
	if($respuesta){
		echo "1";
	}else{
		echo "0";
	}
}
function consultar_form_contacts(){
	global $mysqli;
	$query = "SELECT * FROM contactForm";
	$respuesta = $mysqli->query($query);
	$arreglo = [];
	while($fila = mysqli_fetch_array($respuesta)){
		array_push($arreglo,$fila);
	}
	echo json_encode($arreglo);
}
function consultar_form_contact($id){
	global $mysqli;
	$query = "SELECT * FROM contactForm WHERE form_id = $id";
	$respuesta = $mysqli->query($query);
	$fila = mysqli_fetch_array($respuesta);
	echo json_encode($fila);
}
function insertar_form_contact(){

}
function editar_form_contact(){
	
}
function eliminar_form_contact($id){
	global $mysqli;
	$query = "DELETE FROM contactForm WHERE form_id = $id";
	$respuesta = $mysqli->query($query);
	if($respuesta){
		echo "1";
	}else{
		echo "0";
	}
}
//What we Do
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
	$consulta = "UPDATE wwd SET titulo_wwd = '$titulo', subtitulo_wwd = '$subtitulo', img_wwd = '$img', titulo_img_wwd = '$img_titulo', subtitulo_img_wwd ='$img_sub', bton_wwd ='$boton' WHERE id_wwd = $id";
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

?>