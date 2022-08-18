<?php
include_once "utils/helpers.php";
include_once "models/cliente.php";
include_once "conexion.php";

BD::crearInstancia();

class ClienteController {

    public function lista(){
        $cliente = Cliente::listar();
        include_once "views/clientes/lista.php";
    }

    public function crear(){
        if ($_POST){
            $cod_cli = trim($_POST['cod_cli']);
            $nom_cli = trim($_POST['nom_cli']);
            $contacto_sec = trim($_POST['contacto_sec']);
            $dire_cli = trim($_POST['dire_cli']);
            $dire_sec = trim($_POST['dire_sec']);
            $ciudad_cli = trim($_POST['ciudad_cli']);
            $tel_cli = trim($_POST['tel_cli']);
            $tel_sec = trim($_POST['tel_sec']);
            $email_cli = trim($_POST['email_cli']);
            $desc_cli = trim($_POST['desc_cli']);

            Cliente::crear($cod_cli, $nom_cli, $contacto_sec, $dire_cli, $dire_sec, $ciudad_cli, $tel_cli, $tel_sec, $email_cli, $desc_cli);
            redirect('./?controller=cliente&action=lista');
        }
        $lastId = Cliente::getClienteLastId();
        include_once "views/clientes/crear.php";

    }

    public function editar(){
        $cod_cli = $_REQUEST['cod_cli'];
        $cliente = Cliente::buscar($cod_cli);
        if ($_POST){
            $cod_cli = trim($_POST['cod_cli']);
            $nom_cli = trim($_POST['nom_cli']);
            $contacto_sec = trim($_POST['contacto_sec']);
            $dire_cli = trim($_POST['dire_cli']);
            $dire_sec = trim($_POST['dire_sec']);
            $ciudad_cli = trim($_POST['ciudad_cli']);
            $tel_cli = trim($_POST['tel_cli']);
            $tel_sec = trim($_POST['tel_sec']);
            $email_cli = trim($_POST['email_cli']);
            $desc_cli = trim($_POST['desc_cli']);

            Cliente::editar($cod_cli, $nom_cli, $contacto_sec, $dire_cli, $dire_sec, $ciudad_cli, $tel_cli, $tel_sec, $email_cli, $desc_cli);
            redirect('./?controller=cliente&action=lista');
        }
        $lastId = Cliente::getClienteLastId();
        include_once "views/clientes/editar.php";

    }

    public function borrar(){
        $cod_cli = $_GET['cod_cli'];
        Cliente::borrar($cod_cli);
        redirect('./?controller=cliente&action=lista');
    }


    public function detalle(){
        $cod_cli = $_GET['cod_cli'];
        $cliente = Cliente::buscar($cod_cli);
        include_once "./views/clientes/detalle.php";
    }

    public function movimiento(){
        $cod_cli = $_REQUEST['cod_cli'];
        $infoCliente = Cliente::buscar($cod_cli);
        $movimientoCliente = Cliente::getMovimientoCliente($cod_cli);
        include_once "views/clientes/movimiento.php";
    }

}
