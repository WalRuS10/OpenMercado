<?php
require '../fw/fw.php';
require '../view/Error.php';

if(!isset($_GET['id'])) die();

$vista_error = new Error();
$vista_error->numero_error=$_GET['id'];
$vista_error->render();