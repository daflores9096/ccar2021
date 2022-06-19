<?php
class Proveedor {

    public $cod_pro;
    public $nom_pro;
    public $contacto_sec;
    public $dire_pro;
    public $ciudad_pro;
    public $tel_pro;
    public $tel_sec;
    public $email_pro;
    public $desc_pro;

    public function __construct($cod_pro, $nom_pro, $contacto_sec, $dire_pro, $ciudad_pro, $tel_pro, $tel_sec, $email_pro, $desc_pro){

        $this->cod_pro= $cod_pro;
        $this->nom_pro = $nom_pro;
        $this->contacto_sec = $contacto_sec;
        $this->dire_pro = $dire_pro;
        $this->ciudad_pro = $ciudad_pro;
        $this->tel_pro = $tel_pro;
        $this->tel_sec = $tel_sec;
        $this->email_pro = $email_pro;
        $this->desc_pro = $desc_pro;

    }

    public static function listar(){

        $listaProveedores = [];
        $conexion = BD::crearInstancia();
        $sql = $conexion->query("SELECT * FROM proveedor ORDER BY nom_pro ASC");

        foreach ($sql->fetchAll() as $proveedor){
            $listaProveedores[] = new Proveedor($proveedor['cod_pro'],$proveedor['nom_pro'],$proveedor['contacto_sec'],$proveedor['dire_pro'],$proveedor['ciudad_pro'],$proveedor['tel_pro'],$proveedor['tel_sec'],$proveedor['email_pro'],$proveedor['desc_pro']);
        }

        return $listaProveedores;
    }

    public static function crear($cod_pro, $nom_pro, $contacto_sec, $dire_pro, $ciudad_pro, $tel_pro, $tel_sec, $email_pro, $desc_pro){

        $conexion = BD::crearInstancia();
        $sql = $conexion->prepare("INSERT INTO proveedor (cod_pro, nom_pro, contacto_sec, dire_pro, ciudad_pro, tel_pro, tel_sec, email_pro, desc_pro) VALUES (?,?,?,?,?,?,?,?,?)");
        $sql->execute(array($cod_pro, $nom_pro, $contacto_sec, $dire_pro, $ciudad_pro, $tel_pro, $tel_sec, $email_pro, $desc_pro));
    }

    public static function borrar($codigo){
        $conexion = BD::crearInstancia();
        $sql = $conexion->prepare("DELETE FROM proveedor WHERE cod_pro=?");
        $sql->execute(array($codigo));
    }

    public static function getProveedorLastId(){
        $conexion = BD::crearInstancia();
        $sql = $conexion->query("SELECT MAX(cod_pro) max_id FROM proveedor ORDER BY cod_pro DESC LIMIT 1");
        $res = $sql->fetchAll();

        foreach ($res as $row){
            $lastId = $row['max_id'];
        }
        return $lastId;
    }

    public static function buscar($codigo){
        $conexion = BD::crearInstancia();
        $sql = $conexion->prepare("SELECT * FROM proveedor WHERE cod_pro=?");
        $sql->execute(array($codigo));
        $proveedor = $sql->fetch();
        return new Proveedor($proveedor['cod_pro'],$proveedor['nom_pro'],$proveedor['contacto_sec'],$proveedor['dire_pro'],$proveedor['ciudad_pro'],$proveedor['tel_pro'],$proveedor['tel_sec'],$proveedor['email_pro'],$proveedor['desc_pro']);
    }

    public static function editar($cod_pro, $nom_pro, $contacto_sec, $dire_pro, $ciudad_pro, $tel_pro, $tel_sec, $email_pro, $desc_pro){
        $conexion = BD::crearInstancia();
        $sql = $conexion->prepare("UPDATE proveedor SET nom_pro=?, contacto_sec=?, dire_pro=?, ciudad_pro=?, tel_pro=?, tel_sec=?, email_pro=?, desc_pro=? WHERE cod_pro=?");
        $sql->execute(array($nom_pro, $contacto_sec, $dire_pro, $ciudad_pro, $tel_pro, $tel_sec, $email_pro, $desc_pro, $cod_pro));
    }

    public static function getMovimientoProveedor($cod_pro){
        $conexion = BD::crearInstancia();
        $sql = $conexion->query("SELECT * FROM compra WHERE cod_pro=$cod_pro ORDER BY fecha_fac DESC");
        $res = $sql->fetchAll();
        return $res;
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
