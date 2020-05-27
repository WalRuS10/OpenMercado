<?php
session_start();
require '../fw/fw.php';
require '../model/Publicaciones.php';
if(!$_SESSION['logueado']) die();
if(!isset($_GET['id'])) die();

$idpublicacion = $_GET['id'];
$p = new Publicaciones;
$producto = $p->getPublicacion($idpublicacion);
$p->comprar($idpublicacion, $_SESSION['id']);
header('Location: inicio');
exit;