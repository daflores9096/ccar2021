<?php
include_once "utils/helpers.php";
include_once "models/inventario.php";
include_once "models/inventarioAux.php";
include_once "models/producto.php";
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

        //$inventarioList = Inventario::listar();
        $productList = Producto::listar();

        if (isset($_REQUEST['id_inv'])){
            $inventario = Inventario::buscar($_REQUEST['id_inv']);
            //var_dump($compra);
        }

        //echo "Edit: ".$_REQUEST['edit'];

        if (isset($_REQUEST['edit']) == 0 && isset($inventario)){
            //echo "guardando de CompraObj";
            echo "<script>console.log('guardando InventarioObj')</script>";
            $id_inv = $inventario->id_inv;
            $fecha_lev = $inventario->fecha_lev;
            $descripcion = $inventario->descripcion;
            $fecha_ap = $inventario->fecha_ap;
            $estado = $inventario->estado;
        } else if (isset($_REQUEST['id_inv'])) {
            //echo "guardando de REQUEST";
            echo "<script>console.log('guardando REQUEST')</script>";
            $id_inv = $_REQUEST['id_inv'];
            $fecha_lev = $_REQUEST['fecha_lev'];
            $descripcion = $_REQUEST['descripcion'];
            $fecha_ap = $_REQUEST['fecha_ap'];
            $estado = $_REQUEST['estado'];
        }

        if (isset($_REQUEST['id_inv'])) {

            $id_inv = (isset($_REQUEST['id_inv'])) ? $_REQUEST['id_inv'] : '';
            $cod_item = (isset($_REQUEST['cod_item'])) ? $_REQUEST['cod_item'] : 0;
            $existencia_inv = (isset($_REQUEST['existencia_inv'])) ? $_REQUEST['existencia_inv'] : 0;
            $existencia_sis = (isset($_REQUEST['existencia_sis'])) ? $_REQUEST['existencia_sis'] : 0;
            $diferencia = (isset($_REQUEST['diferencia'])) ? $_REQUEST['diferencia'] : 0;

            if (is_null($inventario->id_inv)){
                Inventario::crear($id_inv, $fecha_lev, $descripcion, $fecha_ap, $estado);
            } else {
                Inventario::editar($id_inv, $fecha_lev, $descripcion, $fecha_ap, $estado);
            }

            if ($cod_item != ''){
                InventarioAux::crear($id_inv, $cod_item, $existencia_inv, $existencia_sis, $diferencia);
            } else {

                if (isset($_REQUEST['cont'])){
                    $cont = $_REQUEST['cont'];

                    if ($cont > 0){
                        echo "<script>console.log('contador_: '+".$cont.")</script>";
                        for ($i=0; $i < $cont; $i++) {
                            //echo "<script>console.log('params: '+".$_POST['id'.$i].")</script>";
                            InventarioAux::editar($_REQUEST['id'.$i], $id_inv, $_REQUEST['cod_item'.$i], $_REQUEST['existencia_inv'.$i], $_REQUEST['existencia_sis'.$i], $_REQUEST['diferencia'.$i]);
                        }
                    }

                }


            }

            $inventario = Inventario::buscar($id_inv);
            $inventarioList = Inventario::getListaInventario($id_inv);

        } else {
            $lastId = Inventario::getIdUltimoInventario();
        }

        include_once "views/inventarios/crear.php";

    }

    public function borrar(){
        $id_inv = $_GET['id_inv'];
        Inventario::borrar($id_inv);
        redirect('./?controller=inventarios&action=lista');
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

    public function borrarItem(){
        $id = $_REQUEST['id'];
        $id_inv = $_REQUEST['id_inv'];
        Inventario::borrarItem($id);
        redirect('./?controller=inventarios&action=crear&id_inv='.$id_inv);
    }

    public function aplicar(){
        $id_inv = $_REQUEST['id_inv'];
        $inventario = Inventario::buscar($id_inv);
        $inventarioList = Inventario::getListaInventario($id_inv);

        //var_dump($inventario);
        //exit();

        Inventario::editar($inventario->id_inv, $inventario->fecha_lev, $inventario->descripcion, date("Y-m-d"), 'Aplicado');

        foreach ($inventarioList as $row){
            Inventario::aplicarInventarioItem($row['cod_item'], $row['existencia_inv']);
        }
        redirect('./?controller=inventarios&action=lista');

    }

}
