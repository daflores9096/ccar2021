<?php
include_once "utils/helpers.php";
include_once "models/inventario.php";
include_once "conexion.php";

BD::crearInstancia();

class InventariosController {

    public function lista(){
        $inventarios = Inventario::listar();
        include_once "views/inventarios/lista.php";
    }

    public function detalle(){
        $id_inv = $_GET['id_inv'];
        $inventario = Inventario::buscar($id_inv);
        $inventarioList = Inventario::getListaInventario($id_inv);
        include_once "./views/inventarios/detalle.php";
    }

    public function crear(){
        if ($_POST){
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
            redirect('./?controller=products&action=lista');
        }
        include_once "views/products/crear.php";

    }

    public function borrar(){
        $codigo = $_GET['codigo'];
        Producto::borrar($codigo);
        redirect('./?controller=products&action=lista');
    }

    public function editar(){
        $codigo = $_GET['codigo'];
        $producto = Producto::buscar($codigo);

        if ($_POST){
            $codigo = $_POST['cod_item'];
            $producto = $_POST['nom_item'];
            $unidad = $_POST['unid_item'];
            $precio = $_POST['precio_item'];
            $caja = $_POST['caja_item'];
            $exi_max = $_POST['exi_max'];
            $existencia = $_POST['existencia'];
            $exi_min = $_POST['exi_min'];
            $detalle = $_POST['deta_item'];

            Producto::editar($codigo, $producto, $unidad, $precio, $caja, $exi_max, $existencia, $exi_min, $detalle);
            redirect('./?controller=products&action=lista');
        }

        include_once "views/products/editar.php";
    }

}
