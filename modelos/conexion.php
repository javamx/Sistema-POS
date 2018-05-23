<?php
    class Conexion{
        static public function conectar(){
            $link = new PDO("mysql:host=localhost;dbname=pos", "root", "");
            $link -> EXEC ("set names utf8");
            return $link;
        }
    }