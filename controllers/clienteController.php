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
            $cod_cli = $_POST['cod_cli'];
            $nom_cli = $_POST['nom_cli'];
            $contacto_sec = $_POST['contacto_sec'];
            $dire_cli = $_POST['dire_cli'];
            $dire_sec = $_POST['dire_sec'];
            $ciudad_cli = $_POST['ciudad_cli'];
            $tel_cli = $_POST['tel_cli'];
            $tel_sec = $_POST['tel_sec'];
            $email_cli = $_POST['email_cli'];
            $desc_cli = $_POST['desc_cli'];

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
            $cod_cli = $_POST['cod_cli'];
            $nom_cli = $_POST['nom_cli'];
            $contacto_sec = $_POST['contacto_sec'];
            $dire_cli = $_POST['dire_cli'];
            $dire_sec = $_POST['dire_sec'];
            $ciudad_cli = $_POST['ciudad_cli'];
            $tel_cli = $_POST['tel_cli'];
            $tel_sec = $_POST['tel_sec'];
            $email_cli = $_POST['email_cli'];
            $desc_cli = $_POST['desc_cli'];

            Cliente::editar($cod_cli, $nom_cli, $contacto_sec, $dire_cli, $dire_sec, $ciudad_cli, $tel_cli, $tel_sec, $email_cli, $desc_cli);
            redirect('./?controller=cliente&action=lista');
        }
        $lastId = Cliente::getClienteLastId();
        include_once "views/clientes/detalle.php";

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

//    public function editar(){
//        $cod_cli = $_GET['cod_cli'];
//        $cliente = Producto::buscar($cod_cli);
//
//        if ($_POST){
//            $cod_cli = $_POST['cod_cli'];
//            $nom_cli = $_POST['nom_cli'];
//            $contacto_sec = $_POST['contacto_sec'];
//            $dire_cli = $_POST['dire_cli'];
//            $dire_sec = $_POST['dire_sec'];
//            $ciudad_cli = $_POST['ciudad_cli'];
//            $tel_cli = $_POST['tel_cli'];
//            $tel_sec = $_POST['tel_sec'];
//            $email_cli = $_POST['email_cli'];
//            $desc_cli = $_POST['desc_cli'];
//
//            Producto::editar($cod_cli, $nom_cli, $contacto_sec, $dire_cli, $dire_sec, $ciudad_cli, $tel_cli, $tel_sec, $email_cli, $desc_cli);
//            redirect('./?controller=cliente&action=lista');
//        }
//
//        include_once "views/products/editar.php";
//    }

    /*
    public function editar(){
        $cod_fac = $_GET['cod_fac'];
        $compra = Compra::buscar($cod_fac);
        $compraList = Compra::getListaProductos($cod_fac);

        if ($_POST){
            $codfac = $_POST['cod_item'];
            $fecha_fac = $_POST['fecha_fac'];
            $cod_pro = $_POST['cod_pro'];
            $nom_pro = $_POST['nom_pro'];
            $total_fac = $_POST['total_fac'];

            Compra::editar($cod_fac, $fecha_fac, $cod_pro, $nom_pro, $total_fac);
            redirect('?controller=compras&action=lista');
        }

        include_once "./views/compras/editar.php";
    }

    public function detalle(){
        $cod_fac = $_GET['cod_fac'];
        $compra = Compra::buscar($cod_fac);
        $compraList = Compra::getListaProductos($cod_fac);

        include_once "./views/compras/detalle.php";
    }
*/

}
