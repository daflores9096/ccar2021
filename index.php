<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$controlador = "pages";
$accion = "inicio";

if (isset($_GET['controller']) && isset($_GET['action'])){

    if ($_GET['controller'] != '' && $_GET['action'] != ''){
        $controlador = $_GET['controller'];
        $accion = $_GET['action'];
    }
}

require_once "views/template.php";
