<?php
require_once('config.php');
require_once('Visita.php');

$db = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($db->connect_error) {
    die("Error de conexión a la base de datos: " . $db->connect_error);
}

$visita = new Visita($db);

if (isset($_GET['agregarVisita'])) {
    $idJesuita = $_GET['idJesuita'];
    $ip = $_GET['ip'];

    if ($visita->agregarVisita($idJesuita, $ip, 'NOW()', 'otro_campo')) {
        echo "Visita agregada con éxito.";
    } else {
        echo "Error al agregar la Visita.";
    }
}






if (isset($_GET['borrarVisita'])) {
    $idVisita = $_GET['idVisita'];

    if ($visita->borrarVisita($idVisita)) {
        echo "Visita borrada con éxito.";
    } else {
        echo "Error al borrar la Visita.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD de Visitas</title>
</head>
<body>
    <h1>CRUD de Visitas</h1>
    
    <h2>Agregar Visita</h2>
    <form method="get">
        <label>ID Jesuita:</label>
        <input type="text" name="idJesuita" required>
        <label>IP:</label>
        <input type="text" name="ip" required>
        <input type="submit" name="agregarVisita" value="Agregar Visita">
    </form>
    
    <h2>Borrar Visita</h2>
    <form method="get">
        <label>ID Visita:</label>
        <input type="text" name="idVisita" required>
        <input type="submit" name="borrarVisita" value="Borrar Visita">
    </form>
    <h2>Volver al Indice</h2>
    <a href="index.html">Inicio</a>
</body>
</html>

