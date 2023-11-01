<?php
require_once('../configuracion/config.php');
require_once('../clases/lugar.php');

$db = new mysqli($db_host, $db_user, $db_pass, $db_name);
$lugar = new Lugar($db);

if ($db->connect_error) {
    die("Error de conexión a la base de datos: " . $db->connect_error);
}

if (isset($_GET['ip'])) {
    $ip = $_GET['ip'];

    // Consultar el lugar por su IP
    $lugarEncontrado = $lugar->buscarLugarPorIP($ip);

    if ($lugarEncontrado) {
        echo '<h2>Modificar Lugar</h2>';
        echo '<form method="post" action="actualizarlugar.php">';
        echo '<input type="hidden" name="ip" value="' . $lugarEncontrado['ip'] . '">';
        echo '<label>Nombre del Lugar:</label>';
        echo '<input type="text" name="lugar" value="' . $lugarEncontrado['lugar'] . '" required>';
        echo '<label>Descripción:</label>';
        echo '<input type="text" name="descripcion" value="' . $lugarEncontrado['descripcion'] . '">';
        echo '<input type="submit" name="modificarLugar" value="Guardar Cambios">';
        echo '</form>';
    } else {
        echo 'No se encontró un Lugar con la IP proporcionada.';
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Listar Lugares</title>
        <link rel="stylesheet" type="text/css" href="../estilos/estilos.css">
    </head>
    <body>
        <form>
            <h2>Volver al Índice</h2>
            <a href="./formlugar.php">Lugares</a>
        </form>
    </body>
</html>

