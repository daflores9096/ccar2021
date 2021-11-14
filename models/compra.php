<?php
class Compra {

    public $cod_fac;
    public $fecha_fac;
    public $cod_pro;
    public $nom_pro;
    public $total_fac;

    public function __construct($cod_fac, $fecha_fac, $cod_pro, $nom_pro, $total_fac){

        $this->cod_fac = $cod_fac;
        $this->fecha_fac = $fecha_fac;
        $this->cod_pro = $cod_pro;
        $this->nom_pro = $nom_pro;
        $this->total_fac = $total_fac;

    }

    public static function listar(){

        $listaCompras = [];
        $conexion = BD::crearInstancia();
        $sql = $conexion->query("SELECT * FROM compra ORDER BY fecha_fac DESC");

        foreach ($sql->fetchAll() as $compra){
            $listaCompras[] = new Compra($compra['cod_fac'],$compra['fecha_fac'],$compra['cod_pro'],$compra['nom_pro'],$compra['total_fac']);
        }

        return $listaCompras;
    }

    public static function crear($cod_fac, $fecha_fac, $cod_pro, $nom_pro, $total_fac){

        $conexion = BD::crearInstancia();
        $sql = $conexion->prepare("INSERT INTO compra (cod_fac, fecha_fac, cod_pro, nom_pro, total_fac) VALUES (?,?,?,?,?)");
        $sql->execute(array($cod_fac, $fecha_fac, $cod_pro, $nom_pro, $total_fac));
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
