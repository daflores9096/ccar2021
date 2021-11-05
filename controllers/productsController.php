<?php
include_once "models/producto.php";
include_once "conexion.php";

BD::crearInstancia();

class ProductsController {
    public function lista(){
        $productos = Producto::listar();
        include_once "views/products/lista.php";
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

    public function borrar(){
        $codigo = $_GET['codigo'];
        Producto::borrar($codigo);
        header('Location:?controller=products&action=lista');
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
            //header('Location:?controller=products&action=editar&codigo='.$codigo);//quedarse en el form de editar
            header('Location:?controller=products&action=lista');//redireccionar a la lista
        }

        include_once "views/products/editar.php";
    }


}