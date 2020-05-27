<?php

session_start();
require '../fw/fw.php';
require '../model/Usuarios.php';
require '../view/RegistroUsuarios.php';


if (isset($_POST['registro'])) {
    if (!isset($_POST['nombre']))
        die();
    $nombre = $_POST['nombre'];
    $u = new Usuarios();
    if($u->usuarioExiste($nombre))
    {
        header('Location: ../proyecto/error-5');
        exit;
    }
        
    if (!isset($_POST['password']))
        die();
    $password = $_POST['password'];
    $u->newUsuario($nombre, $password);
    $datos_usuario = $u->getUsuario($nombre);
    //login ok
    $_SESSION['logueado'] = true;
    $_SESSION['nombre'] = $datos_usuario['nombre'];
    $_SESSION['id'] = $datos_usuario['idusuario'];
    header("Location: inicio");
    exit;
}
$vista_login = new RegistroUsuarios;
$vista_login->render();

