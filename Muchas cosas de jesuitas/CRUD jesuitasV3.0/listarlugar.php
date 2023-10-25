<?php
    require_once('config.php');
    require_once('lugar.php');

    $db = new mysqli($db_host, $db_user, $db_pass, $db_name);
    $lugar = new Lugar($db);

    $lugaresList = $lugar->listarLugares();

    if (!empty($lugaresList)) {
        echo '<h2>Lista de Lugares</h2>';
        echo '<table>';
        echo '<tr><th>IP</th><th>Nombre</th><th>Descripción</th></tr>';
        foreach ($lugaresList as $lugarData) {
            echo '<tr>';
            echo '<td>' . $lugarData['ip'] . '</td>';
            echo '<td>' . $lugarData['lugar'] . '</td>';
            echo '<td>' . $lugarData['descripcion'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'No hay lugares en la base de datos.';
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Listado</title>
        <link rel="stylesheet" type="text/css" href="estilos.css">
    </head>
    <body>
        <form></form>
            <h2>Volver al Índice</h2>
            <a href="index.html">Inicio</a>
        </form>
    </body>
</html>