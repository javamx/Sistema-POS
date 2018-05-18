<?php
    require_once "controladores/plantilla.controlador.php";
    require_once "controladores/categorias.controlador.php";
    require_once "controladores/clientes.controlador.php";
    require_once "controladores/productos.controlador.php";
    require_once "controladores/usuarios.controlador.php";
    require_once "controladores/ventas.controlador.php";
    require_once "controladores/plantilla.controlador.php";
    require_once "modelos/categorias.controlador.php";
    require_once "modelos/clientes.controlador.php";
    require_once "modelos/productos.controlador.php";
    require_once "modelos/usuarios.controlador.php";
    require_once "modelos/catventasegorias.controlador.php";

    $plantilla = new ControladorPlantilla();
    $plantilla -> ctrPlantilla();