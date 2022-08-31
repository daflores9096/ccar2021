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
            $tipo_mov = $_POST['tipo_mov'];
            $cod_mov = $_POST['cod_mov'];
            $cod_item = $_POST['cod_item'];
            $fecha_mov = $_POST['fecha_mov'];
            $cod_cli_pro = $_POST['cod_cli_pro'];
            $entrada = $_POST['entrada'];
            $salida = $_POST['salida'];
            Movimiento::crear($tipo_mov, $cod_mov, $cod_item, $fecha_mov, $cod_cli_pro, $entrada, $salida);
        }
    }

    public function imprimir(){
        $cod_prod = $_GET['cod_prod'];
        $producto = Producto::buscar($cod_prod);
        $movimientos = Movimiento::listar($cod_prod);
        include_once "views/movimientos/imprimir.php";
    }

}
