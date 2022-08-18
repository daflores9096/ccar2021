<?php
include_once "utils/helpers.php";
include_once "models/usuario.php";
include_once "conexion.php";

BD::crearInstancia();

class UsuarioController {

    public function lista(){
        $usuario = Usuario::listar();
        include_once "views/usuarios/lista.php";
    }

    public function crear(){
        if ($_POST){
            $usuario_id = trim($_POST['usuario_id']);
            $usuario_nombre = trim($_POST['usuario_nombre']);
            $usuario_clave = md5(trim($_POST['usuario_clave']));
            $usuario_email = trim($_POST['usuario_email']);
            $usuario_freg = trim($_POST['usuario_freg']);
            $nivel_acceso = trim($_POST['nivel_acceso']);

            Usuario::crear($usuario_id, $usuario_nombre, $usuario_clave, $usuario_email, $usuario_freg, $nivel_acceso);
            redirect('./?controller=usuario&action=lista');
        }
        $lastId = Usuario::getUsuarioLastId();
        include_once "views/usuarios/crear.php";

    }

    public function borrar(){
        $usuario_id = $_GET['usuario_id'];
        Usuario::borrar($usuario_id);
        redirect('./?controller=usuario&action=lista');
    }

    public function editar(){
        $usuario_id = $_REQUEST['usuario_id'];
        $usuario = Usuario::buscar($usuario_id);
        if ($_POST){
            $usuario_id = trim($_POST['usuario_id']);
            $usuario_nombre = trim($_POST['usuario_nombre']);
            $usuario_clave = md5(trim($_POST['usuario_clave']));
            $usuario_email = trim($_POST['usuario_email']);
            $usuario_freg = trim($_POST['usuario_freg']);
            $nivel_acceso = trim($_POST['nivel_acceso']);

            Usuario::editar($usuario_id, $usuario_nombre, $usuario_clave, $usuario_email, $usuario_freg, $nivel_acceso);
            redirect('./?controller=usuario&action=lista');
        }
        $lastId = Usuario::getUsuarioLastId();
        include_once "views/usuarios/editar.php";

    }

    public function detalle(){
        $usuario_id = $_GET['usuario_id'];
        $usuario = Usuario::buscar($usuario_id);
        include_once "./views/usuarios/detalle.php";
    }
}
