<?php
class Usuario {

    public $usuario_id;
    public $usuario_nombre;
    public $usuario_clave;
    public $usuario_email;
    public $usuario_freg;
    public $nivel_acceso;

    public function __construct($usuario_id, $usuario_nombre, $usuario_clave, $usuario_email, $usuario_freg, $nivel_acceso){

        $this->usuario_id= $usuario_id;
        $this->usuario_nombre = $usuario_nombre;
        $this->usuario_clave = $usuario_clave;
        $this->usuario_email = $usuario_email;
        $this->usuario_freg = $usuario_freg;
        $this->nivel_acceso = $nivel_acceso;

    }

    public static function listar(){

        $listaUsuarios = [];
        $conexion = BD::crearInstancia();
        $sql = $conexion->query("SELECT * FROM usuarios ORDER BY usuario_id ASC");

        foreach ($sql->fetchAll() as $usuario){
            $listaUsuarios[] = new Usuario($usuario['usuario_id'],$usuario['usuario_nombre'],$usuario['usuario_clave'],$usuario['usuario_email'],$usuario['usuario_freg'],$usuario['nivel_acceso']);
        }

        return $listaUsuarios;
    }

    public static function crear($usuario_id, $usuario_nombre, $usuario_clave, $usuario_email, $usuario_freg, $nivel_acceso){

        $conexion = BD::crearInstancia();
        $sql = $conexion->prepare("INSERT INTO usuarios (usuario_id, usuario_nombre, usuario_clave, usuario_email, usuario_freg, nivel_acceso) VALUES (?,?,?,?,?,?)");
        $sql->execute(array($usuario_id, $usuario_nombre, $usuario_clave, $usuario_email, $usuario_freg, $nivel_acceso));
    }

    public static function borrar($codigo){
        $conexion = BD::crearInstancia();
        $sql = $conexion->prepare("DELETE FROM usuarios WHERE usuario_id=?");
        $sql->execute(array($codigo));
    }

    public static function getUsuarioLastId(){
        $conexion = BD::crearInstancia();
        $sql = $conexion->query("SELECT MAX(usuario_id) max_id FROM usuarios ORDER BY usuario_id DESC LIMIT 1");
        $res = $sql->fetchAll();

        foreach ($res as $row){
            $lastId = $row['max_id'];
        }
        return $lastId;
    }

    public static function buscar($codigo){
        $conexion = BD::crearInstancia();
        $sql = $conexion->prepare("SELECT * FROM usuarios WHERE usuario_id=?");
        $sql->execute(array($codigo));
        $usuario = $sql->fetch();
        return new Usuario($usuario['usuario_id'],$usuario['usuario_nombre'],$usuario['usuario_clave'],$usuario['usuario_email'],$usuario['usuario_freg'],$usuario['nivel_acceso']);
    }

    public static function editar($usuario_id, $usuario_nombre, $usuario_clave, $usuario_email, $usuario_freg, $nivel_acceso){
        $conexion = BD::crearInstancia();
        $sql = $conexion->prepare("UPDATE usuarios SET usuario_id=?, usuario_nombre=?, usuario_clave=?, usuario_email=?, usuario_freg=?, nivel_acceso=? WHERE usuario_id=?");
        $sql->execute(array($usuario_id, $usuario_nombre, $usuario_clave, $usuario_email, $usuario_freg, $nivel_acceso, $usuario_id));
    }

}

?>
