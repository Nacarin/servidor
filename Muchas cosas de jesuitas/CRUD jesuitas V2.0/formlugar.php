<?php
require_once('config.php');
require_once('Lugar.php');

$db = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($db->connect_error) {
    die("Error de conexión a la base de datos: " . $db->connect_error);
}

$lugar = new Lugar($db);

if (isset($_GET['agregarLugar'])) {
    $ip = $_GET['ip'];
    $lugarNombre = $_GET['lugar'];
    $descripcion = $_GET['descripcion'];

    if ($lugar->agregarLugar($ip, $lugarNombre, $descripcion)) {
        echo "Lugar agregado con éxito.";
    } else {
        echo "Error al agregar el Lugar.";
    }
}

if (isset($_GET['modificarLugar'])) {
    $ip = $_GET['ip'];
    $lugarNombre = $_GET['lugar'];
    $descripcion = $_GET['descripcion'];

    if ($lugar->modificarLugar($ip, $lugarNombre, $descripcion)) {
        echo "Lugar modificado con éxito.";
    } else {
        echo "Error al modificar el Lugar.";
    }
}

if (isset($_GET['borrarLugar'])) {
    $ip = $_GET['ip'];

    if ($lugar->borrarLugar($ip)) {
        echo "Lugar borrado con éxito.";
    } else {
        echo "Error al borrar el Lugar.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD de Lugares</title>
</head>
<body>
    <h1>CRUD de Lugares</h1>
    
    <h2>Agregar Lugar</h2>
    <form method="get">
        <label>IP:</label>
        <input type="text" name="ip" required>
        <label>Nombre del Lugar:</label>
        <input type="text" name="lugar" required>
        <label>Descripción:</label>
        <input type="text" name="descripcion">
        <input type="submit" name="agregarLugar" value="Agregar Lugar">
    </form>
    
    <h2>Modificar Lugar</h2>
    <form method="get">
        <label>IP:</label>
        <input type="text" name="ip" required>
        <label>Nuevo Nombre del Lugar:</label>
        <input type="text" name="lugar" required>
        <label>Nueva Descripción:</label>
        <input type="text" name="descripcion">
        <input type="submit" name="modificarLugar" value="Modificar Lugar">
    </form>
    
    <h2>Borrar Lugar</h2>
    <form method="get">
        <label>IP:</label>
        <input type="text" name="ip" required>
        <input type="submit" name="borrarLugar" value="Borrar Lugar">
    </form>
    <h2>Volver al Indice</h2>
    <a href="index.html">Inicio</a>
</body>
</html>
