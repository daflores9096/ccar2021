<?php
include_once "utils/helpers.php";
include_once "models/compra.php";
include_once "models/proveedor.php";
include_once "conexion.php";

BD::crearInstancia();

class ComprasController {

    public function lista(){
        $compras = Compra::listar();
        include_once "views/compras/lista.php";
    }

    public function crear(){
        $proveedorList = Proveedor::listar();
        if ($_POST){
            $cod_fac = $_POST['cod_fac'];
            $fecha_fac = $_POST['fecha_fac'];
            $cod_pro = $_POST['cod_pro'];
            $nom_pro = $_POST['nom_pro'];
            $total_fac = $_POST['total_fac'];

            Compra::crear($cod_fac, $fecha_fac, $cod_pro, $nom_pro, $total_fac);
            redirect('./?controller=compras&action=lista');
        }
        include_once "views/compras/crear.php";

    }

        public function borrar(){
            $cod_fac = $_GET['cod_fac'];
            Compra::borrar($cod_fac);
            redirect('./?controller=compras&action=lista');
        }

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


}