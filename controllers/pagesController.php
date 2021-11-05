<?php

class PagesController {
    public function inicio(){
        include_once "views/pages/inicio.php";
    }

    public function error(){
        include_once "views/pages/error.php";
    }
}