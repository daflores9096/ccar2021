<?php
include_once "utils/helpers.php";
include_once "models/compra.php";
include_once "models/compraAux.php";
include_once "models/proveedor.php";
include_once "models/producto.php";
include_once "conexion.php";

BD::crearInstancia();

class ComprasController {

    public function lista(){
        $compras = Compra::listar();
        include_once "views/compras/lista.php";
    }

    public function crear(){

        $proveedorList = Proveedor::listar();
        $productList = Producto::listar();

        if (isset($_POST['cod_fac'])){

            echo "contenido POST: ";
            var_dump($_POST);

            $cod_fac = $_POST['cod_fac'];
            $fecha_fac = $_POST['fecha_fac'];
            $cod_pro = $_POST['cod_pro'];
            $nom_pro = $_POST['nom_pro'];
            $total_fac = $_POST['total_fac'];

            $cod_item = $_POST['cod_item'];
            $cant_fac = $_POST['cant_item'];
            $precio_uni = $_POST['precio_uni'];
            $precio_ven = $_POST['precio_ven'];
            $importe_fac = $_POST['importe_fac'];

            $compra = Compra::buscar($cod_fac);

            echo "<br><br>";
            var_dump($compra);

            if (is_null($compra->cod_fac)){
                Compra::crear($cod_fac, $fecha_fac, $cod_pro, $nom_pro, $total_fac);
            } else {
                Compra::editar($cod_fac, $fecha_fac, $cod_pro, $nom_pro, $total_fac);
            }

            if ($cod_item != ''){
                CompraAux::crear($cod_fac, $cod_item, $cant_fac, $precio_uni, $precio_ven, $importe_fac);
            } else {

                if (isset($_POST['cont'])){
                    $cont = $_POST['cont'];

                    if ($cont > 0){
                        echo "<script>console.log('contador_: '+".$cont.")</script>";
                        for ($i=0; $i < $cont; $i++) {
                            echo "<script>console.log('params: '+".$_POST['id'.$i].")</script>";
                            CompraAux::editar($_POST['id'.$i], $cod_fac, $_POST['cod_item'.$i], $_POST['cant_fac'.$i], $_POST['precio_uni'.$i], $_POST['precio_ven'.$i], $_POST['importe_fac'.$i]);
                        }
                    }

                }


            }


            $compra = Compra::buscar($cod_fac);
            $compraList = Compra::getListaProductos($cod_fac);
            //redirect('./?controller=compras&action=lista');
        } else {
            $lastId = Compra::getIdUltimacompra();
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