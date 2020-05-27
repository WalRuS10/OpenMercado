<?php

session_start();
require '../fw/fw.php';
require '../model/Usuarios.php';
require '../view/LoginUsuarios.php';



if (isset($_POST['logueo'])) {
    if (!isset($_POST['nombre']))
        die();
    $nombre = $_POST['nombre'];
    try {
        $u = new Usuarios();
        $datos_usuario = $u->getUsuario($nombre);
    } catch (UsuarioIncorrecto $err) {
        header("Location: error-1");
        exit;
    }

    if (!isset($_POST['password']))
        die();
    $password = $_POST['password'];
    if ($u->validarPassword($datos_usuario['idusuario'], $password)) {
        //login ok
        $_SESSION['logueado'] = true;
        $_SESSION['nombre'] = $datos_usuario['nombre'];
        $_SESSION['id'] = $datos_usuario['idusuario'];
        header("Location: inicio");
        exit;
    } else {
        header("Location: error-2");
        exit;
    }
}
$vista_login = new LoginUsuarios;
$vista_login->render();

