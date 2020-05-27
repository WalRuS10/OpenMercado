<?php
session_start();
require '../fw/fw.php';
require '../model/Publicaciones.php';
require '../view/AgregarPublicacion.php';

if(!$_SESSION['logueado']) die();

if(isset($_POST['guardar']))
{
	if(!isset($_POST['titulo'])) die();
		$titulo = $_POST['titulo'];
	if(!isset($_POST['descripcion'])) die();
		$descripcion = $_POST['descripcion'];
	if(!isset($_POST['precio'])) die();
		$precio = $_POST['precio']; 
		
	$p = new Publicaciones();
	$idp=$p->newPublicacion($_SESSION['id'], $titulo, $descripcion, $precio);
	header("Location: detalle-".$idp);
	exit;
}
$vista_formulario = new AgregarPublicacion;
$vista_formulario->render();
?>
