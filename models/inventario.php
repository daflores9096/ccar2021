<?php
class Inventario {

    public $id_inv;
    public $fecha_lev;
    public $descripcion;
    public $fecha_ap;
    public $estado;

    public function __construct($id_inv, $fecha_lev, $descripcion, $fecha_ap, $estado){

        $this->id_inv = $id_inv;
        $this->fecha_lev = $fecha_lev;
        $this->descripcion = $descripcion;
        $this->fecha_ap = $fecha_ap;
        $this->estado = $estado;

    }

    public static function listar(){

        $listaInventarios = [];
        $conexion = BD::crearInstancia();
        $sql = $conexion->query("SELECT * FROM inventario ORDER BY fecha_lev DESC");

        foreach ($sql->fetchAll() as $inventario){
            $listaInventarios[] = new Inventario($inventario['id_inv'],$inventario['fecha_lev'],$inventario['descripcion'],$inventario['fecha_ap'],$inventario['estado']);
        }

        return $listaInventarios;
    }

    public static function getListaInventario ($id_inv) {
        $inventarioList = [];
        $conexion = BD::crearInstancia();
        $sql = $conexion->query("SELECT ia.*, it.nom_item, it.unid_item 
                                          FROM inventario_aux ia 
                                          INNER JOIN item it ON ia.cod_item=it.cod_item
                                          WHERE ia.id_inv=$id_inv");
        $res = $sql->fetchAll();

        foreach ($res as $inventario){

            $inventarioList[] = array(
                "id" => $inventario['id'],
                "id_inv" => $inventario['id_inv'],
                "cod_item" => $inventario['cod_item'],
                "nom_item" => $inventario['nom_item'],
                "unid_item" => $inventario['unid_item'],
                "existencia_inv" => $inventario["existencia_inv"],
                "existencia_sis" => $inventario["existencia_sis"],
                "diferencia" => $inventario['diferencia']);
        }

        return $inventarioList;
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
        $sql = $conexion->prepare("SELECT * FROM inventario WHERE id_inv=?");
        $sql->execute(array($codigo));
        $inventario = $sql->fetch();
        return new Inventario($inventario['id_inv'],$inventario['fecha_lev'],$inventario['descripcion'],$inventario['fecha_ap'], $inventario['estado']);
    }

    public static function editar($codigo, $producto, $unidad, $precio, $caja, $exi_max, $existencia, $exi_min, $detalle){
        $conexion = BD::crearInstancia();
        $sql = $conexion->prepare("UPDATE item SET nom_item=?, unid_item=?, precio_item=?, caja_item=?, exi_max=?, existencia=?, exi_min=?, deta_item=? WHERE cod_item=?");
        $sql->execute(array($producto, $unidad, $precio, $caja, $exi_max, $existencia, $exi_min, $detalle, $codigo));
    }
}

?>
