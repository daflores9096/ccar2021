<?php
class InventarioAux {

    public $id_inv;
    public $cod_item;
    public $existencia_inv;
    public $existencia_sis;
    public $diferencia;

    public function __construct($id_inv, $cod_item, $existencia_inv, $existencia_sis, $diferencia){

        $this->id_inv = $id_inv;
        $this->cod_item = $cod_item;
        $this->existencia_inv = $existencia_inv;
        $this->existencia_sis = $existencia_sis;
        $this->diferencia = $diferencia;

    }

    public static function crear($id_inv, $cod_item, $existencia_inv, $existencia_sis, $diferencia){

        $conexion = BD::crearInstancia();
        $sql = $conexion->prepare("INSERT INTO inventario_aux (id_inv, cod_item, existencia_inv, existencia_sis, diferencia) VALUES (?,?,?,?,?)");
        $sql->execute(array($id_inv, $cod_item, $existencia_inv, $existencia_sis, $diferencia));
    }

    public static function borrar($codigo){
        $conexion = BD::crearInstancia();
        $sql = $conexion->prepare("DELETE FROM inventario_aux WHERE id=?");
        $sql->execute(array($codigo));
    }

    public static function editar($id, $id_inv, $cod_item, $existencia_inv, $existencia_sis, $diferencia){
        $conexion = BD::crearInstancia();
        $sql = $conexion->prepare("UPDATE inventario_aux SET id_inv=?, cod_item=?, existencia_inv=?, existencia_sis=?, diferencia=? WHERE id=$id");
        $sql->execute(array($id_inv, $cod_item, $existencia_inv, $existencia_sis, $diferencia));
    }
}

?>