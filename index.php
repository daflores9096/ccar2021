<?php
$controlador = "pages";
$accion = "inicio";

if (isset($_GET['controller']) && isset($_GET['action'])){

    if ($_GET['controller'] != '' && $_GET['action'] != ''){
        $controlador = $_GET['controller'];
        $accion = $_GET['action'];
    }
}

require_once "views/template.php";