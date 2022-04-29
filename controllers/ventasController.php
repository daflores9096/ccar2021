<?php
include_once "utils/helpers.php";
include_once "models/venta.php";
include_once "models/ventaAux.php";
include_once "models/cliente.php";
include_once "models/producto.php";
include_once "conexion.php";

BD::crearInstancia();

class VentasController {

    public function lista(){
        $ventas = Venta::listar();
        include_once "views/ventas/lista.php";
    }

    public function borrar(){
        $cod_fac = $_GET['cod_fac'];
        Venta::borrar($cod_fac);
        redirect('./?controller=ventas&action=lista');
    }

    public function crear(){

        $clienteList = Cliente::listar();
        $productList = Producto::listar();

        if (isset($_REQUEST['cod_fac'])){

            $cod_fac = $_REQUEST['cod_fac'];
            $fecha_fac = $_REQUEST['fecha_fac'];
            $cod_cli = $_REQUEST['cod_cli'];
            $nom_cli = $_REQUEST['nom_cli'];
            $dire_cli = $_REQUEST['dire_cli'];
            $traspaso = $_REQUEST['traspaso'];

            if (isset($_REQUEST['total_fac'])){
                $total_fac = $_REQUEST['total_fac'];
                $tot_bul = $_REQUEST['tot_bul'];
            } else {
                $total_fac = 0;
                $tot_bul = 0;
            }


            $cod_item = (isset($_REQUEST['cod_item'])) ? $_REQUEST['cod_item'] : '';
            $cant_fac = (isset($_REQUEST['cant_fac'])) ? $_REQUEST['cant_fac'] : 0;
            $bultos = (isset($_REQUEST['bultos'])) ? $_REQUEST['bultos'] : 0;
            $precio_uni = (isset($_REQUEST['precio_uni'])) ? $_REQUEST['precio_uni'] : 0;
            $importe_fac = (isset($_REQUEST['importe_fac'])) ? $_REQUEST['importe_fac'] : 0;

            $venta = Venta::buscar($cod_fac);

            if (is_null($venta->cod_fac)){
                Venta::crear($cod_fac, $fecha_fac, $cod_cli, $nom_cli, $dire_cli, $traspaso, $total_fac, $tot_bul);
            } else {
                Venta::editar($cod_fac, $fecha_fac, $cod_cli, $nom_cli, $dire_cli, $traspaso, $total_fac, $tot_bul);
            }

            if ($cod_item != ''){
                VentaAux::crear($cod_fac, $cod_item, $bultos, $cant_fac, $precio_uni, $importe_fac);
            } else {

                if (isset($_REQUEST['cont'])){
                    $cont = $_REQUEST['cont'];

                    if ($cont > 0){
                        //echo "<script>console.log('contador: '+".$cont.")</script>";
                        for ($i=0; $i < $cont; $i++) {
                            //echo "<script>console.log('params: '+".$_POST['id'.$i]."+' precio_ven: '+".$_POST['precio_ven'.$i].")</script>";
                            VentaAux::editar($_POST['id'.$i], $cod_fac, $_POST['cod_item'.$i], $_POST['bultos'.$i], $_POST['cant_fac'.$i], $_POST['precio_uni'.$i], $_POST['importe_fac'.$i]);
                        }
                    }

                }


            }


            $venta = Venta::buscar($cod_fac);
            $ventaList = Venta::getListaProductos($cod_fac);
            //redirect('./?controller=compras&action=lista');
        } else {
            $lastId = Venta::getIdUltimaVenta();
        }

        include_once "views/ventas/crear.php";

    }

    public function borrarItem(){
        $id = $_REQUEST['id'];
        Venta::borrarItem($id);
        //redirect('./?controller=compras&action=lista');
        //echo "Item ".$id." borrado !!!";
    }

    public function editar(){
        $cod_fac = $_GET['cod_fac'];
        $venta = Venta::buscar($cod_fac);
        $ventaList = Venta::getListaProductos($cod_fac);

        if ($_POST){
            $codfac = $_POST['cod_item'];
            $fecha_fac = $_POST['fecha_fac'];
            $cod_cli = $_POST['cod_cli'];
            $nom_cli = $_POST['nom_cli'];
            $dire_cli = $_POST['dire_cli'];
            $traspaso = $_POST['traspaso'];
            $total_fac = $_POST['total_fac'];
            $tot_bul = $_POST['tot_bul'];

            Venta::editar($cod_fac, $fecha_fac, $cod_cli, $nom_cli, $dire_cli, $traspaso, $total_fac, $tot_bul);
            redirect('?controller=ventas&action=lista');
        }

        include_once "./views/compras/editar.php";
    }

    public function detalle(){
        $cod_fac = $_GET['cod_fac'];
        $venta = Venta::buscar($cod_fac);
        $ventaList = Venta::getListaProductos($cod_fac);

        include_once "./views/ventas/detalle.php";
    }


}
