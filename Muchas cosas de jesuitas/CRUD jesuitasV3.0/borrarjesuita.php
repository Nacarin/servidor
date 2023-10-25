<?php
// Incluye el archivo de configuración de la base de datos y la clase Jesuita
require_once('config.php');
require_once('jesuita.php');

$db = new mysqli($db_host, $db_user, $db_pass, $db_name);
$jesuita = new Jesuita($db);

if ($db->connect_error) {
    die("Error de conexión a la base de datos: " . $db->connect_error);
}

// Procesar la solicitud para borrar un Jesuita
if (isset($_GET['borrarJesuita'])) {
    $idJesuita = $_GET['idJesuita'];

    if ($jesuita->borrarJesuita($idJesuita)) {
        echo "Jesuita borrado con éxito.";
    } else {
        echo "Error al borrar el Jesuita.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Borrar Jesuita</title>
    <link rel="stylesheet type="text/css" href="estilos.css">
</head>
<body>
    <h1>Borrar Jesuita</h1>
    <form method="get">
        <label>ID Jesuita:</label>
        <input type="text" name="idJesuita" required>
        <input type="submit" name="borrarJesuita" value="Borrar Jesuita">
    </form>
    <h2>Volver al Índice</h2>
    <a href="index.html">Inicio</a>
</body>
</html>
