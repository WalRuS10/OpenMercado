<?php
session_start();
require '../fw/fw.php';
require '../model/Publicaciones.php';
require '../view/DetallePublicacion.php';



if(!isset($_GET['id'])) die();

try{
	$p = new Publicaciones();
	$det_pub = $p->getPublicacion($_GET['id']);
	$vista_detalle = new DetallePublicacion;
	$vista_detalle->id = $det_pub['idpublicacion'];
        $vista_detalle->vendedor = $det_pub['nombrevendedor'];
	$vista_detalle->titulo=$det_pub['titulo'];
	$vista_detalle->descripcion=$det_pub['descripcion'];
	$vista_detalle->precio=$det_pub['precio'];
	$vista_detalle->render();
}
catch(PublicacionInexistente $err){
	header("Location: error-4");
	exit;
}