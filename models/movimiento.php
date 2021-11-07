<?php
class Movimiento {

    public $id_mov;
    public $tipo_mov;
    public $cod_mov;
    public $cod_item;
    public $fecha_mov;
    public $cod_cli_pro;
    public $nom_cli_pro;
    public $entrada;
    public $salida;

    public function __construct($id_mov, $tipo_mov, $cod_mov, $cod_item, $fecha_mov, $cod_cli_pro, $nom_cli_pro, $entrada, $salida){

        $this->id_mov = $id_mov;
        $this->tipo_mov = $tipo_mov;
        $this->cod_mov = $cod_mov;
        $this->cod_item = $cod_item;
        $this->fecha_mov = $fecha_mov;
        $this->cod_cli_pro = $cod_cli_pro;
        $this->nom_cli_pro = $nom_cli_pro;
        $this->entrada = $entrada;
        $this->salida = $salida;

    }

    public static function listar($codigo){

        $listaMovimientos = [];
        $conexion = BD::crearInstancia();
        $sql = $conexion->query("SELECT * FROM movimiento WHERE cod_item='".$codigo."' ORDER BY fecha_mov DESC");

        foreach ($sql->fetchAll() as $movimiento){
            $listaMovimientos[] = new Movimiento($movimiento['id_mov'], $movimiento['tipo_mov'], $movimiento['cod_mov'], $movimiento['cod_item'], $movimiento['fecha_mov'], $movimiento['cod_cli_pro'], $movimiento['nom_cli_pro'], $movimiento['entrada'], $movimiento['salida']);
        }

        return $listaMovimientos;
    }

    public static function crear($id_mov, $tipo_mov, $cod_mov, $cod_item, $fecha_mov, $cod_cli_pro, $nom_cli_pro, $entrada, $salida){

        $conexion = BD::crearInstancia();
        $sql = $conexion->prepare("INSERT INTO movimiento (id_mov, tipo_mov, cod_mov, cod_item, fecha_mov, cod_cli_pro, nom_cli_pro, entrada, salida) VALUES (?,?,?,?,?,?,?,?,?)");
        $sql->execute(array($id_mov, $tipo_mov, $cod_mov, $cod_item, $fecha_mov, $cod_cli_pro, $nom_cli_pro, $entrada, $salida));
    }

    public static function getNombreProducto($codigo) {
        $conexion = BD::crearInstancia();
        $sql = $conexion->prepare("SELECT * FROM item WHERE cod_item=?");
        $sql->execute(array($codigo));
        $producto = $sql->fetch();
        return new Producto($producto['cod_item'],$producto['nom_item'],$producto['unid_item'],$producto['precio_item'], $producto['caja_item'],$producto['exi_max'],$producto['existencia'],$producto['exi_min'],$producto['deta_item']);
    }
/*
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
*/
}

?>
