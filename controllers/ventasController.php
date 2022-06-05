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
            $venta = Venta::buscar($_REQUEST['cod_fac']);
            //var_dump($venta);
        }

        if (isset($_REQUEST['edit']) == 0 && isset($venta)){
            //echo "guardando de VentaObj";
            echo "<script>console.log('guardando de VentaObj')</script>";
            $cod_fac = $venta->cod_fac;
            $fecha_fac = $venta->fecha_fac;
            $cod_cli = $venta->cod_cli;
            $nom_cli = $venta->nom_cli;
            $dire_cli = $venta->dire_cli;
            $traspaso = $venta->traspaso;
            $total_fac = $venta->total_fac;
            $tot_bul = $venta->tot_bul;
        } else if (isset($_REQUEST['cod_fac'])) {
            //echo "guardando de REQUEST";
            echo "<script>console.log('guardando de REQUEST')</script>";
            $cod_fac = $_REQUEST['cod_fac'];
            $fecha_fac = $_REQUEST['fecha_fac'];
            $cod_cli = $_REQUEST['cod_cli'];
            $nom_cli = $_REQUEST['nom_cli'];
            $dire_cli = $_REQUEST['dire_cli'];
            $traspaso = $_REQUEST['traspaso'];
            $total_fac = $_REQUEST['total_fac'];
            $tot_bul = $_REQUEST['tot_bul'];
        }


        if (isset($_REQUEST['cod_fac'])){

//            $cod_fac = $venta->cod_fac;
//            $fecha_fac = $venta->fecha_fac;
//            $cod_cli = $venta->cod_cli;
//            $nom_cli = $venta->nom_cli;
//            $dire_cli = $venta->dire_cli;
//            $traspaso = $venta->traspaso;
//            $total_fac = $venta->total_fac;
//            $tot_bul = $venta->tot_bul;


            $cod_item = (isset($_REQUEST['cod_item'])) ? $_REQUEST['cod_item'] : '';
            $cant_fac = (isset($_REQUEST['cant_fac'])) ? $_REQUEST['cant_fac'] : 0;
            $bultos = (isset($_REQUEST['bultos'])) ? $_REQUEST['bultos'] : 0;
            $precio_uni = (isset($_REQUEST['precio_uni'])) ? $_REQUEST['precio_uni'] : 0;
            $importe_fac = (isset($_REQUEST['importe_fac'])) ? $_REQUEST['importe_fac'] : 0;



            if (is_null($venta->cod_fac)){
                Venta::crear($_REQUEST['cod_fac'], $_REQUEST['fecha_fac'], $_REQUEST['cod_cli'], $_REQUEST['nom_cli'], $_REQUEST['dire_cli'], $_REQUEST['traspaso'], $_REQUEST['total_fac'], $_REQUEST['tot_bul']);
            } else {
                Venta::editar($cod_fac, $fecha_fac, $cod_cli, $nom_cli, $dire_cli, $traspaso, $total_fac, $tot_bul);
            }

            if ($cod_item != ''){
                VentaAux::crear($_REQUEST['cod_fac'], $cod_item, $bultos, $cant_fac, $precio_uni, $importe_fac);
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

            $venta = Venta::buscar($_REQUEST['cod_fac']);
            $ventaList = Venta::getListaProductos($_REQUEST['cod_fac']);
        } else {
            $lastId = Venta::getIdUltimaVenta();
        }

        include_once "views/ventas/crear.php";

    }

    public function borrarItem(){
        $id = $_REQUEST['id'];
        $cod_fac = $_REQUEST['cod_fac'];
        $tot_bul = $_REQUEST['tot_bul'];
        $total_venta = $_REQUEST['total_venta'];
        Venta::borrarItem($id, $cod_fac, $tot_bul, $total_venta);
        //echo "borrando item: ".$id." - cod_fac: ".$cod_fac;
        redirect('./?controller=ventas&action=crear&cod_fac='.$cod_fac);
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
