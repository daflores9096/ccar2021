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
}

?>
