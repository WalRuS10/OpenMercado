<?php
session_start();
require '../fw/fw.php';
require '../model/Publicaciones.php';
require '../view/ResultadosBusqueda.php';

if(isset($_POST['buscar']))
{
    if(!isset($_POST['txtbusqueda'])) die();
    $textobusqueda = $_POST['txtbusqueda'];
    try{
        $p = new Publicaciones();
        $vista_resutados = new ResultadosBusqueda();
        $vista_resutados->listapublicaciones = $p->buscar($textobusqueda);
        $vista_resutados->render();
    }
    catch(BusquedaSinResultados $err)
    {
        header("Location: error-3");
        exit;
    }
}