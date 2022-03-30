<?php
class CompraAux {

    public $cod_fac;
    public $cod_item;
    public $cant_fac;
    public $precio_uni;
    public $precio_ven;
    public $importe_fac;

    public function __construct($cod_fac, $cod_item, $cant_fac, $precio_uni, $precio_ven, $importe_fac){

        $this->cod_fac = $cod_fac;
        $this->cod_item = $cod_item;
        $this->cant_fac = $cant_fac;
        $this->precio_uni = $precio_uni;
        $this->precio_ven = $precio_ven;
        $this->importe_fac = $importe_fac;

    }

    public static function crear($cod_fac, $cod_item, $cant_fac, $precio_uni, $precio_ven, $importe_fac){

        $conexion = BD::crearInstancia();
        $sql = $conexion->prepare("INSERT INTO compra_aux (cod_fac, cod_item, cant_fac, precio_uni, precio_ven, importe_fac) VALUES (?,?,?,?,?,?)");
        $sql->execute(array($cod_fac, $cod_item, $cant_fac, $precio_uni, $precio_ven, $importe_fac));
    }

    public static function borrar($codigo){
        $conexion = BD::crearInstancia();
        $sql = $conexion->prepare("DELETE FROM compra_aux WHERE Id=?");
        $sql->execute(array($codigo));
    }

    public static function editar($id, $cod_fac, $cod_item, $cant_fac, $precio_uni, $precio_ven, $importe_fac){
        $conexion = BD::crearInstancia();
        echo "<script>console.log('editando...')</script>";
        $sql = $conexion->prepare("UPDATE compra_aux SET cod_fac=?, cod_item=?, cant_fac=?, precio_uni=?, precio_ven=?, importe_fac=? WHERE id=$id");
        $sql->execute(array($cod_fac, $cod_item, $cant_fac, $precio_uni, $precio_ven, $importe_fac));
    }


    /*
    public static function listar(){

        $listaCompras = [];
        $conexion = BD::crearInstancia();
        $sql = $conexion->query("SELECT * FROM compra ORDER BY fecha_fac DESC");

        foreach ($sql->fetchAll() as $compra){
            $listaCompras[] = new Compra($compra['cod_fac'],$compra['fecha_fac'],$compra['cod_pro'],$compra['nom_pro'],$compra['total_fac']);
        }

        return $listaCompras;
    }


    public static function getListaProductos ($cod_fac) {
        $compraList = [];
        $conexion = BD::crearInstancia();
        $sql = $conexion->query("SELECT * FROM compra_aux WHERE cod_fac=$cod_fac");
        $res = $sql->fetchAll();

        foreach ($res as $compra){

            //obtener el nombre del item/producto
            $cod_prod = $compra['cod_item'];
            $sql1 = $conexion->prepare("SELECT * FROM item WHERE cod_item=? LIMIT 1");
            $sql1->execute([$cod_prod]);
            $producto = $sql1->fetch();

            $compraList[] = array(
                "cod_fac" => $compra['cod_fac'],
                "cod_item" => $compra['cod_item'],
                "nom_item" => $producto["nom_item"],
                "cant_fac" => $compra['cant_fac'],
                "precio_uni" => $compra['precio_uni'],
                "precio_ven" => $compra['precio_ven'],
                "importe_fac" => $compra['importe_fac']);
        }

        return $compraList;
    }

    public static function getIdUltimacompra(){
        $conexion = BD::crearInstancia();
        $sql = $conexion->query("SELECT cod_fac FROM compra ORDER BY fecha_fac DESC LIMIT 1");
        $res = $sql->fetchAll();

        foreach ($res as $row){
            $lastId = $row['cod_fac'];
        }
        return $lastId;
    }




    public static function buscar($codigo){
        $conexion = BD::crearInstancia();
        $sql = $conexion->prepare("SELECT * FROM compra WHERE cod_fac=?");
        $sql->execute(array($codigo));
        $compra = $sql->fetch();
        return new Compra($compra['cod_fac'],$compra['fecha_fac'],$compra['cod_pro'],$compra['nom_pro'], $compra['total_fac']);
    }

    public static function editar($cod_fac, $fecha_fac, $cod_pro, $nom_pro, $total_fac){
        $conexion = BD::crearInstancia();
        $sql = $conexion->prepare("UPDATE item SET fecha_fac=?, cod_pro=?, nom_pro=?, total_pro=? WHERE cod_cod_fac=?");
        $sql->execute(array($fecha_fac, $cod_pro, $nom_pro, $total_fac, $cod_fac));
    }
*/

}

?>
