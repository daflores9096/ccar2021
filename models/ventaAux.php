<?php
class VentaAux {

    public $cod_fac;
    public $cod_item;
    public $bultos;
    public $cant_fac;
    public $precio_uni;
    public $importe_fac;

    public function __construct($cod_fac, $cod_item, $bultos, $cant_fac, $precio_uni, $importe_fac){

        $this->cod_fac = $cod_fac;
        $this->cod_item = $cod_item;
        $this->bultos = $bultos;
        $this->cant_fac = $cant_fac;
        $this->precio_uni = $precio_uni;
        $this->importe_fac = $importe_fac;

    }

    public static function crear($cod_fac, $cod_item, $bultos, $cant_fac, $precio_uni, $importe_fac){

        $conexion = BD::crearInstancia();
        $sql = $conexion->prepare("INSERT INTO venta_aux (cod_fac, cod_item, bultos, cant_fac, precio_uni, importe_fac) VALUES (?,?,?,?,?,?)");
        $sql->execute(array($cod_fac, $cod_item, $bultos, $cant_fac, $precio_uni, $importe_fac));
    }

    public static function borrar($codigo){
        $conexion = BD::crearInstancia();
        $sql = $conexion->prepare("DELETE FROM venta_aux WHERE Id=?");
        $sql->execute(array($codigo));
    }

    public static function editar($id, $cod_fac, $cod_item, $bultos, $cant_fac, $precio_uni, $importe_fac){
        $conexion = BD::crearInstancia();
        //echo "<script>console.log('editando...')</script>";
        $sql = $conexion->prepare("UPDATE venta_aux SET cod_fac=?, cod_item=?, bultos=?, cant_fac=?, precio_uni=?, importe_fac=? WHERE Id=$id");
        $sql->execute(array($cod_fac, $cod_item, $bultos, $cant_fac, $precio_uni, $importe_fac));
    }

}

?>
