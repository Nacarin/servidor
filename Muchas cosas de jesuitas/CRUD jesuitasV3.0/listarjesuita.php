<?php
// Incluye el archivo de configuración de la base de datos y la clase Jesuita
require_once('config.php');
require_once('jesuita.php');

// Inicializa la conexión a la base de datos
$db = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($db->connect_error) {
    die("Error de conexión a la base de datos: " . $db->connect_error);
}

$jesuita = new Jesuita($db);
$jesuitasList = $jesuita->listarJesuitas();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Listar Jesuitas</title>
    <link rel="stylesheet type="text/css" href="estilos.css">
</head>
<body>
