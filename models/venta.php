<?php
class Venta {
    //public $id;
    public $cod_fac;
    public $fecha_fac;
    public $cod_cli;
    public $nom_cli;
    public $dire_cli;
    public $traspaso;
    public $total_fac;
    public $tot_bul;

    public function __construct($cod_fac, $fecha_fac, $cod_cli, $nom_cli, $dire_cli, $traspaso, $total_fac, $tot_bul){

        $this->cod_fac = $cod_fac;
        $this->fecha_fac = $fecha_fac;
        $this->cod_cli = $cod_cli;
        $this->nom_cli = $nom_cli;
        $this->dire_cli = $dire_cli;
        $this->traspaso = $traspaso;
        $this->total_fac = $total_fac;
        $this->tot_bul = $tot_bul;

    }

    public static function listar(){

        $listaVentas = [];
        $conexion = BD::crearInstancia();
        $sql = $conexion->query("SELECT * FROM venta ORDER BY fecha_fac DESC");

        foreach ($sql->fetchAll() as $venta){
            $listaVentas[] = new Venta($venta['cod_fac'],$venta['fecha_fac'],$venta['cod_cli'],$venta['nom_cli'], $venta['dire_cli'], $venta['traspaso'], $venta['total_fac'], $venta['tot_bul']);
        }

        return $listaVentas;
    }

    public static function buscar($codigo){
        $conexion = BD::crearInstancia();
        $sql = $conexion->prepare("SELECT * FROM venta WHERE cod_fac=?");
        $sql->execute(array($codigo));
        $venta = $sql->fetch();
        return new Venta($venta['cod_fac'],$venta['fecha_fac'],$venta['cod_cli'],$venta['nom_cli'], $venta['dire_cli'], $venta['traspaso'], $venta['total_fac'], $venta['tot_bul']);
    }

    public static function getListaProductos ($cod_fac) {
        $ventaList = [];
        $conexion = BD::crearInstancia();
        $sql = $conexion->query("SELECT * FROM venta_aux WHERE cod_fac=$cod_fac");
        $res = $sql->fetchAll();

        foreach ($res as $venta){

            //obtener el nombre del item/producto
            $cod_prod = $venta['cod_item'];
            $sql1 = $conexion->prepare("SELECT * FROM item WHERE cod_item=? LIMIT 1");
            $sql1->execute([$cod_prod]);
            $producto = $sql1->fetch();

            $ventaList[] = array(
                "id" => $venta['Id'],
                "cod_fac" => $venta['cod_fac'],
                "cod_item" => $venta['cod_item'],
                "producto" => $producto['nom_item'],
                "bultos" => $venta["bultos"],
                "cant_fac" => $venta['cant_fac'],
                "precio_uni" => $venta['precio_uni'],
                "importe_fac" => $venta['importe_fac']);
        }

        return $ventaList;
    }

/*
    public static function getIdUltimacompra(){
        $conexion = BD::crearInstancia();
        $sql = $conexion->query("SELECT MAX(cod_fac) max_id FROM compra ORDER BY fecha_fac DESC LIMIT 1");
        $res = $sql->fetchAll();

        foreach ($res as $row){
            $lastId = $row['max_id'];
        }
        return $lastId;
    }

    public static function crear($cod_fac, $fecha_fac, $cod_pro, $nom_pro, $total_fac){

        $conexion = BD::crearInstancia();
        $sql = $conexion->prepare("INSERT INTO compra (cod_fac, fecha_fac, cod_pro, nom_pro, total_fac) VALUES (?,?,?,?,?)");
        $sql->execute(array($cod_fac, $fecha_fac, $cod_pro, $nom_pro, $total_fac));
    }

    public static function borrar($codigo){
        $conexion = BD::crearInstancia();
        $sql = $conexion->prepare("DELETE FROM compra WHERE cod_fac=?");
        $sql->execute(array($codigo));
        $sql2 = $conexion->prepare("DELETE FROM compra_aux WHERE cod_fac=?");
        $sql2->execute(array($codigo));
    }

    public static function borrarItem($codigo){
        $conexion = BD::crearInstancia();
        $sql = $conexion->prepare("DELETE FROM compra_aux WHERE id=?");
        $sql->execute(array($codigo));
    }



    public static function editar($cod_fac, $fecha_fac, $cod_pro, $nom_pro, $total_fac){
        $conexion = BD::crearInstancia();
        $sql = $conexion->prepare("UPDATE compra SET fecha_fac=?, cod_pro=?, nom_pro=?, total_fac=? WHERE cod_fac=?");
        $sql->execute(array($fecha_fac, $cod_pro, $nom_pro, $total_fac, $cod_fac));
    }
    */

}

?>