<?php
class Producto {

    public $codigo;
    public $producto;
    public $unidad;
    public $precio;
    public $caja;
    public $exi_max;
    public $existencia;
    public $exi_min;
    public $detalle;

    public function __construct($codigo, $producto, $unidad, $precio, $caja, $exi_max, $existencia, $exi_min, $detalle){

        $this->codigo = $codigo;
        $this->producto = $producto;
        $this->unidad = $unidad;
        $this->precio = $precio;
        $this->caja = $caja;
        $this->exi_max = $exi_max;
        $this->existencia = $existencia;
        $this->exi_min = $exi_min;
        $this->detalle = $detalle;

    }

    public static function listar(){

        $listaProductos = [];
        $conexion = BD::crearInstancia();
        $sql = $conexion->query("SELECT * FROM item ORDER BY cod_item ASC");

        foreach ($sql->fetchAll() as $producto){
            $listaProductos[] = new Producto($producto['cod_item'],$producto['nom_item'],$producto['unid_item'],$producto['precio_item'],$producto['caja_item'],$producto['exi_max'],$producto['existencia'],$producto['exi_min'],$producto['deta_item']);
        }

        return $listaProductos;
    }

    public static function crear($codigo, $producto, $unidad, $precio, $caja, $exi_max, $existencia, $exi_min, $detalle){

        $conexion = BD::crearInstancia();
        $sql = $conexion->prepare("INSERT INTO item (cod_item, nom_item, unid_item, precio_item, caja_item, exi_max, existencia, exi_min, deta_item) VALUES (?,?,?,?,?,?,?,?,?)");
        $sql->execute(array($codigo, $producto, $unidad, $precio, $caja, $exi_max, $existencia, $exi_min, $detalle));
    }

    public static function borrar($codigo){
        $conexion = BD::crearInstancia();
        $sql = $conexion->prepare("DELETE FROM item WHERE cod_item=?");
        $sql->execute(array($codigo));
    }

    public static function buscar($codigo){
        $conexion = BD::crearInstancia();
        $sql = $conexion->prepare("SELECT * FROM item WHERE cod_item=?");
        $sql->execute(array($codigo));
        $producto = $sql->fetch();
        return new Producto($producto['cod_item'],$producto['nom_item'],$producto['unid_item'],$producto['precio_item'], $producto['caja_item'],$producto['exi_max'],$producto['existencia'],$producto['exi_min'],$producto['deta_item']);
    }

    public static function editar($codigo, $producto, $unidad, $precio, $caja, $exi_max, $existencia, $exi_min, $detalle){
        $conexion = BD::crearInstancia();
        $sql = $conexion->prepare("UPDATE item SET nom_item=?, unid_item=?, precio_item=?, caja_item=?, exi_max=?, existencia=?, exi_min=?, deta_item=? WHERE cod_item=?");
        $sql->execute(array($producto, $unidad, $precio, $caja, $exi_max, $existencia, $exi_min, $detalle, $codigo));
    }
}

?>
