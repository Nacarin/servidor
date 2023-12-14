<?php 
    session_start();

    ini_set('display_errors', 1);

    require_once getcwd() . 'config/serverconfig.php';

    // Si no hay controlador en la URL, se usa el controlador por defecto
    if (!isset($_GET["controlador"])) {
        $_GET["controlador"] = constant("DEFAULT_CONTROLLER");
    }

    // Si no hay acción en la URL, se usa la acción por defecto
    if (!isset($_GET["action"])) {
        $_GET["action"] = constant("DEFAULT_ACTION");
    }

    // Se construye la ruta al controlador
    $ruta_controlador = "controladores/" . strtolower($_GET["controlador"]) . ".php";

    // Si el controlador no existe, se usa el controlador por defecto
    if (!file_exists($ruta_controlador)) {
        $ruta_controlador = "controladores/" . constant("DEFAULT_CONTROLLER") . ".php";
    }

    // Se carga el controlador
    require_once getcwd() . "/" .  $ruta_controlador;

    $nombre_controlador = $_GET["controlador"];
    $controlador = new $nombre_controlador();

    // Datos para las vistas
    $datos["datos"] = array();
    if (method_exists($controlador, $_GET["action"])) {
        $datos["datos"] = $controlador->{$_GET["action"]}();
    }


?>