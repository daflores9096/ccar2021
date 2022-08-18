<?php
include_once "utils/helpers.php";
include_once "models/proveedor.php";
include_once "conexion.php";

BD::crearInstancia();

class ProveedorController {

    public function lista(){
        $proveedor = Proveedor::listar();
        include_once "views/proveedores/lista.php";
    }

    public function crear(){
        if ($_POST){
            $cod_pro = trim($_POST['cod_pro']);
            $nom_pro = trim($_POST['nom_pro']);
            $contacto_sec = trim($_POST['contacto_sec']);
            $dire_pro = trim($_POST['dire_pro']);
            $ciudad_pro = trim($_POST['ciudad_pro']);
            $tel_pro = trim($_POST['tel_pro']);
            $tel_sec = trim($_POST['tel_sec']);
            $email_pro = trim($_POST['email_pro']);
            $desc_pro = trim($_POST['desc_pro']);

            Proveedor::crear($cod_pro, $nom_pro, $contacto_sec, $dire_pro, $ciudad_pro, $tel_pro, $tel_sec, $email_pro, $desc_pro);
            redirect('./?controller=proveedor&action=lista');
        }
        $lastId = Proveedor::getProveedorLastId();
        include_once "views/proveedores/crear.php";

    }

    public function borrar(){
        $cod_pro = $_GET['cod_pro'];
        Proveedor::borrar($cod_pro);
        redirect('./?controller=proveedor&action=lista');
    }

    public function editar(){
        $cod_pro = $_REQUEST['cod_pro'];
        $proveedor = Proveedor::buscar($cod_pro);
        if ($_POST){
            $cod_pro = trim($_POST['cod_pro']);
            $nom_pro = trim($_POST['nom_pro']);
            $contacto_sec = trim($_POST['contacto_sec']);
            $dire_pro = trim($_POST['dire_pro']);
            $ciudad_pro = trim($_POST['ciudad_pro']);
            $tel_pro = trim($_POST['tel_pro']);
            $tel_sec = trim($_POST['tel_sec']);
            $email_pro = trim($_POST['email_pro']);
            $desc_pro = trim($_POST['desc_pro']);

            Proveedor::editar($cod_pro, $nom_pro, $contacto_sec, $dire_pro, $ciudad_pro, $tel_pro, $tel_sec, $email_pro, $desc_pro);
            redirect('./?controller=proveedor&action=lista');
        }
        $lastId = Proveedor::getProveedorLastId();
        include_once "views/proveedores/editar.php";

    }

    public function movimiento(){
        $cod_pro = $_REQUEST['cod_pro'];
        $infoProveedor = Proveedor::buscar($cod_pro);
        $movimientoProveedor = Proveedor::getMovimientoProveedor($cod_pro);
        include_once "views/proveedores/movimiento.php";
    }

    public function detalle(){
        $cod_pro = $_GET['cod_pro'];
        $proveedor = Proveedor::buscar($cod_pro);
        include_once "./views/proveedores/detalle.php";
    }

}
