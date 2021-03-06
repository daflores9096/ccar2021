<?php
include_once "models/producto.php";
include_once "models/movimiento.php";
include_once "conexion.php";

BD::crearInstancia();

class MovimientosController {

    public function lista(){
        $cod_prod = $_GET['cod_prod'];

        $producto = Producto::buscar($cod_prod);

        $movimientos = Movimiento::listar($cod_prod);
        include_once "views/movimientos/lista.php";
    }

    public function crear(){
        if ($_POST){
            //print_r($_POST);
            $codigo = $_POST['cod_item'];
            $producto = $_POST['nom_item'];
            $unidad = $_POST['unid_item'];
            $precio = $_POST['precio_item'];
            $caja = $_POST['caja_item'];
            $exi_max = $_POST['exi_max'];
            $existencia = $_POST['existencia'];
            $exi_min = $_POST['exi_min'];
            $detalle = $_POST['deta_item'];

            Producto::crear($codigo, $producto, $unidad, $precio, $caja, $exi_max, $existencia, $exi_min, $detalle);
            header('Location:?controller=products&action=lista');
        }
        include_once "views/products/crear.php";

    }

    public function imprimir(){
        $cod_prod = $_GET['cod_prod'];
        $producto = Producto::buscar($cod_prod);
        $movimientos = Movimiento::listar($cod_prod);
        include_once "views/movimientos/imprimir.php";
    }

}
