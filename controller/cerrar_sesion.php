<?php
session_start();
$_SESSION['logueado'] = false;

header('Location: inicio');
exit;