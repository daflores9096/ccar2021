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
        $sql = $conexion->query("SELECT * FROM inventario ORDER BY id_inv DESC");

        foreach ($sql->fetchAll() as $inventario){
            $listaInventarios[] = new Inventario($inventario['id_inv'],$inventario['fecha_lev'],$inventario['descripcion'],$inventario['fecha_ap'],$inventario['estado']);
        }

        return $listaInventarios;
    }

    public static function getListaInventario ($id_inv) {
        $inventarioList = [];
        $conexion = BD::crearInstancia();
        $sql = $conexion->query("SELECT ia.*, it.* 
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
                "existencia" => $inventario["existencia"],
                "diferencia" => $inventario['diferencia']);
        }

        return $inventarioList;
    }

    public static function getIdUltimoInventario(){
        $conexion = BD::crearInstancia();
        $sql = $conexion->query("SELECT MAX(id_inv) max_id FROM inventario ORDER BY fecha_lev DESC LIMIT 1");
        $res = $sql->fetchAll();

        foreach ($res as $row){
            $lastId = $row['max_id'];
        }
        return $lastId;
    }

    public static function crear($id_inv, $fecha_lev, $descripcion, $fecha_ap, $estado){

        $conexion = BD::crearInstancia();
        $sql = $conexion->prepare("INSERT INTO inventario (id_inv, fecha_lev, descripcion, fecha_ap, estado) VALUES (?,?,?,?,?)");
        $sql->execute(array($id_inv, $fecha_lev, $descripcion, $fecha_ap, $estado));
    }

    public static function borrar($codigo){
        $conexion = BD::crearInstancia();
        $sql = $conexion->prepare("DELETE FROM inventario WHERE id_inv=?");
        $sql->execute(array($codigo));

        $sql1 = $conexion->prepare("DELETE FROM inventario_aux WHERE id_inv=?");
        $sql1->execute(array($codigo));
    }

    public static function buscar($codigo){
        $conexion = BD::crearInstancia();
        $sql = $conexion->prepare("SELECT * FROM inventario WHERE id_inv=?");
        $sql->execute(array($codigo));
        $inventario = $sql->fetch();
        return new Inventario($inventario['id_inv'],$inventario['fecha_lev'],$inventario['descripcion'],$inventario['fecha_ap'], $inventario['estado']);
    }

    public static function editar($id_inv, $fecha_lev, $descripcion, $fecha_ap, $estado){
        $conexion = BD::crearInstancia();
        $sql = $conexion->prepare("UPDATE inventario SET fecha_lev=?, descripcion=?, fecha_ap=?, estado=? WHERE id_inv=?");
        $sql->execute(array($fecha_lev, $descripcion, $fecha_ap, $estado, $id_inv));
    }

    public static function borrarItem($codigo){
        $conexion = BD::crearInstancia();

        $sql = $conexion->prepare("DELETE FROM inventario_aux WHERE id=?");
        $sql->execute(array($codigo));
    }

    public static function aplicarInventarioItem($cod_item, $existencia){
        $conexion = BD::crearInstancia();
        $sql = $conexion->prepare("UPDATE item SET existencia=? WHERE cod_item=?");
        $sql->execute(array($existencia, $cod_item));
    }

}

?>
