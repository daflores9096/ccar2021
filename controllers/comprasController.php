<?php
include_once "utils/helpers.php";
include_once "models/compra.php";
include_once "models/compraAux.php";
include_once "models/proveedor.php";
include_once "models/producto.php";
include_once "models/movimiento.php";
include_once "conexion.php";

BD::crearInstancia();

class ComprasController {

    public function lista(){
        $compras = Compra::listar();
        include_once "views/compras/lista.php";
    }

    public function borrar(){
        $cod_fac = $_GET['cod_fac'];
        $compraList = Compra::getListaProductos($cod_fac);

        foreach ($compraList as $row){
            Producto::restaurarInventarioCompra($row['cod_item'], $row['cant_fac']);
        }
        Compra::borrar($cod_fac);
        Movimiento::borrar($cod_fac);
        redirect('./?controller=compras&action=lista');
    }

    public function resetCompra($cod_fac){
        $movimientoList = Movimiento::buscar($cod_fac);
        //var_dump($movimientoList);
        //exit();
        foreach ($movimientoList as $row){
            Producto::restaurarInventarioCompra($row->cod_item, $row->entrada);
        }
    }

    public function crear(){

        $proveedorList = Proveedor::listar();
        $productList = Producto::listar();

        if (isset($_REQUEST['cod_fac'])){
            $compra = Compra::buscar($_REQUEST['cod_fac']);
            //var_dump($compra);
        }

        //echo "Edit: ".$_REQUEST['edit'];

        if (isset($_REQUEST['edit']) == 0 && isset($compra)){
            //echo "guardando de CompraObj";
            echo "<script>console.log('guardando CompraObj')</script>";
            $cod_fac = $compra->cod_fac;
            $fecha_fac = $compra->fecha_fac;
            $cod_pro = $compra->cod_pro;
            $nom_pro = $compra->nom_pro;
            $total_fac = $compra->total_fac;
        } else if (isset($_REQUEST['cod_fac'])) {
            //echo "guardando de REQUEST";
            echo "<script>console.log('guardando REQUEST')</script>";
            $cod_fac = $_REQUEST['cod_fac'];
            $fecha_fac = $_REQUEST['fecha_fac'];
            $cod_pro = $_REQUEST['cod_pro'];
            $nom_pro = $_REQUEST['nom_pro'];
            $total_fac = $_REQUEST['total_fac'];
        }

        if (isset($_REQUEST['cod_fac'])) {

            $cod_item = (isset($_REQUEST['cod_item'])) ? $_REQUEST['cod_item'] : '';
            $cant_fac = (isset($_REQUEST['cant_fac'])) ? $_REQUEST['cant_fac'] : 0;
            $precio_uni = (isset($_REQUEST['precio_uni'])) ? $_REQUEST['precio_uni'] : 0;
            $precio_ven = (isset($_REQUEST['precio_ven'])) ? $_REQUEST['precio_ven'] : 0;
            $importe_fac = (isset($_REQUEST['importe_fac'])) ? $_REQUEST['importe_fac'] : 0;

            if (is_null($compra->cod_fac)){
                Compra::crear($cod_fac, $fecha_fac, $cod_pro, $nom_pro, $total_fac);
            } else {
                Compra::editar($cod_fac, $fecha_fac, $cod_pro, $nom_pro, $total_fac);
            }

            if ($cod_item != ''){
                CompraAux::crear($cod_fac, $cod_item, $cant_fac, $precio_uni, $precio_ven, $importe_fac);
            } else {

                if (isset($_REQUEST['cont'])){
                    $cont = $_REQUEST['cont'];

                    if ($cont > 0){
                        //echo "<script>console.log('contador_: '+".$cont.")</script>";
                        if (isset($_REQUEST['terminar']) == 1 && isset($_REQUEST['ed']) == 1){
                            //reset venta
                            $this->resetCompra($_REQUEST['cod_fac']);
                            Movimiento::borrar($_REQUEST['cod_fac']);
                        }

                        for ($i=0; $i < $cont; $i++) {
                            //echo "<script>console.log('params: '+".$_POST['id'.$i].")</script>";
                            CompraAux::editar($_POST['id'.$i], $cod_fac, $_POST['cod_item'.$i], $_POST['cant_fac'.$i], $_POST['precio_uni'.$i], $_POST['precio_ven'.$i], $_POST['importe_fac'.$i]);

                            if (isset($_REQUEST['terminar']) && $_REQUEST['terminar'] == 1) {
                                Producto::actualizarInventarioCompra($_POST['cod_item' . $i], $_POST['cant_fac' . $i]);
                                Movimiento::crear('C', $_REQUEST['cod_fac'], $_REQUEST['cod_item'.$i], date("Y-m-d"), $_REQUEST['cod_pro'], $_REQUEST['nom_pro'], $_REQUEST['cant_fac'.$i], 0 );
                            }
                        }
                    }

                }


            }

            $compra = Compra::buscar($cod_fac);
            $compraList = Compra::getListaProductos($cod_fac);

        } else {
            $lastId = Compra::getIdUltimaCompra();
        }

        include_once "views/compras/crear.php";

    }


    public function borrarItem(){
        $id = $_REQUEST['id'];
        $cod_fac = $_REQUEST['cod_fac'];
        $total_compra = $_REQUEST['total_compra'];
        Compra::borrarItem($id, $cod_fac, $total_compra);
        redirect('./?controller=compras&action=crear&cod_fac='.$cod_fac.'&ed=1');
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

    public function nota(){
        $cod_fac = $_GET['cod_fac'];
        $compra = Compra::buscar($cod_fac);
        $compraList = Compra::getListaProductos($cod_fac);

        include_once "./views/compras/nota.php";
    }

    public function print_nota(){
        $cod_fac = $_GET['cod_fac'];
        $compra = Compra::buscar($cod_fac);
        $compraList = Compra::getListaProductos($cod_fac);

        include_once "./views/compras/print_nota.php";
    }

    public function print_nota2(){
        $cod_fac = $_GET['cod_fac'];
        $compra = Compra::buscar($cod_fac);
        $compraList = Compra::getListaProductos($cod_fac);

        include_once "./views/compras/print_nota2.php";
    }


}
