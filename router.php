<?php
//$controlador y $accion vienen desde index.php
include_once "controllers/".$controlador."Controller.php";
$objController = ucfirst($controlador)."Controller";
$controller = new $objController();
$controller->$accion();
