<?php
class Cliente {

    public $cod_cli;
    public $nom_cli;
    public $contacto_sec;
    public $dire_cli;
    public $dire_sec;
    public $ciudad_cli;
    public $tel_cli;
    public $tel_sec;
    public $email_cli;
    public $desc_cli;

    public function __construct($cod_cli, $nom_cli, $contacto_sec, $dire_cli, $dire_sec, $ciudad_cli, $tel_cli, $tel_sec, $email_cli, $desc_cli){

        $this->cod_cli= $cod_cli;
        $this->nom_cli = $nom_cli;
        $this->contacto_sec = $contacto_sec;
        $this->dire_cli = $dire_cli;
        $this->dire_sec = $dire_sec;
        $this->ciudad_cli = $ciudad_cli;
        $this->tel_cli = $tel_cli;
        $this->tel_sec = $tel_sec;
        $this->email_cli = $email_cli;
        $this->desc_cli = $desc_cli;

    }

    public static function listar(){

        $listaClientes = [];
        $conexion = BD::crearInstancia();
        $sql = $conexion->query("SELECT * FROM cliente ORDER BY nom_cli ASC");

        foreach ($sql->fetchAll() as $cliente){
            $listaClientes[] = new Cliente($cliente['cod_cli'],$cliente['nom_cli'],$cliente['contacto_sec'],$cliente['dire_cli'],$cliente['dire_sec'],$cliente['ciudad_cli'],$cliente['tel_cli'],$cliente['tel_sec'],$cliente['email_cli'],$cliente['desc_cli']);
        }

        return $listaClientes;
    }

    /*
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

    public static function crear($cod_fac, $fecha_fac, $cod_pro, $nom_pro, $total_fac){

        $conexion = BD::crearInstancia();
        $sql = $conexion->prepare("INSERT INTO compra (cod_fac, fecha_fac, cod_pro, nom_pro, total_fac) VALUES (?,?,?,?,?)");
        $sql->execute(array($cod_fac, $fecha_fac, $cod_pro, $nom_pro, $total_fac));
    }

    public static function borrar($codigo){
        $conexion = BD::crearInstancia();
        $sql = $conexion->prepare("DELETE FROM compra WHERE cod_fac=?");
        $sql->execute(array($codigo));
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
