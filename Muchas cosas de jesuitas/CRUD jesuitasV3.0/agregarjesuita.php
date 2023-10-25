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

// Procesar la solicitud para agregar un Jesuita
if (isset($_GET['agregarJesuita'])) {
    $idJesuita = $_GET['idJesuita'];
    $nombre = $_GET['nombre'];
    $firma = $_GET['firma'];

    if ($jesuita->agregarJesuita($idJesuita, $nombre, $firma)) {
        echo "Jesuita agregado con éxito.";
    } else {
        echo "Error al agregar el Jesuita.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Agregar Jesuita</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
    <h1>Agregar Jesuita</h1>
    <form method="get">
        <label>ID Jesuita:</label>
        <input type="text" name="idJesuita" required>
        <label>Nombre:</label>
        <input type="text" name="nombre" required>
        <label>Firma:</label>
        <input type="text" name="firma" required>
        <input type="submit" name="agregarJesuita" value="Agregar Jesuita">
    </form>
    <h2>Volver al Índice</h2>
    <a href="index.html">Inicio</a>
</body>
</html>
