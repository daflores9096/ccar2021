<?php
class Login {
//    public $username;
//    public $pass;

    public function __construct(){

//        $this->username = $username;
//        $this->pass = $pass;

    }

    public static function getUserData($username, $pass){
        $conexion = BD::crearInstancia();
        $hashpass = md5($pass);
        $sql = $conexion->query("SELECT * FROM usuarios WHERE usuario_nombre='$username' and usuario_clave='$hashpass'");
        $sql->execute(array($username, $hashpass));
        $userData = $sql->fetch();
        return $userData;
    }
}