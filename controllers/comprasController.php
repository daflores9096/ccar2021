<?php
include_once "models/compra.php";
include_once "conexion.php";

BD::crearInstancia();

class ComprasController {

    public function lista(){
        $compras = Compra::listar();
        include_once "views/compras/lista.php";
    }

    public function crear(){
        if ($_POST){
            //print_r($_POST);
            $cod_fac = $_POST['cod_fac'];
            $fecha_fac = $_POST['fecha_fac'];
            $cod_pro = $_POST['cod_pro'];
            $nom_pro = $_POST['nom_pro'];
            $total_fac = $_POST['total_fac'];

            Compra::crear($cod_fac, $fecha_fac, $cod_pro, $nom_pro, $total_fac);
            header('Location:?controller=compras&action=lista');
        }
        include_once "views/compras/crear.php";

    }
    /*
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
    */

}
