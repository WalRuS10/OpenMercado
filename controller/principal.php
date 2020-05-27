<?php
session_start();
require '../fw/fw.php';
require '../model/Publicaciones.php';
require '../view/PantallaPrincipal.php';

$p = new Publicaciones();
$vista_principal = new PantallaPrincipal;
$vista_principal->listaUltimas = $p->listaUltimas();
$vista_principal->render();


