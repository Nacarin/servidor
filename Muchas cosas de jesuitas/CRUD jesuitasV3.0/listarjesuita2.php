<?php
    require_once('config.php');
    require_once('jesuita.php');

    $db = new mysqli($db_host, $db_user, $db_pass, $db_name);
    $jesuita = new Jesuita($db);

    $jesuitasList = $jesuita->listarJesuitas();

    if (!empty($jesuitasList)) {
        echo '<h2>Lista de Jesuitas</h2>';
        echo '<table>';
        echo '<tr><th>ID Jesuita</th><th>Nombre</th><th>Firma</th></tr>';
        foreach ($jesuitasList as $jesuitaData) {
            echo '<tr>';
            echo '<td>' . $jesuitaData['idJesuita'] . '</td>';
            echo '<td>' . $jesuitaData['nombre'] . '</td>';
            echo '<td>' . $jesuitaData['firma'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'No hay jesuitas en la base de datos.';
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