<?php
    require_once('config.php');
    require_once('visita.php'); // Asegúrate de tener una clase Visita definida

    $db = new mysqli($db_host, $db_user, $db_pass, $db_name);
    $visita = new Visita($db); // Crea una instancia de la clase Visita

    $visitasList = $visita->listarVisitas(); // Llama al método listarVisitas

    if (!empty($visitasList)) {
        echo '<h2>Lista de Visitas</h2>';
        echo '<table>';
        echo '<tr><th>ID Visita</th><th>ID Jesuita</th><th>Fecha</th></tr>';
        foreach ($visitasList as $visitaData) {
            echo '<tr>';
            echo '<td>' . $visitaData['idVisita'] . '</td>';
            echo '<td>' . $visitaData['idJesuita'] . '</td>';
            echo '<td>' . $visitaData['fechaHora'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'No hay visitas en la base de datos.';
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Listado de Visitas</title>
        <link rel="stylesheet" type="text/css" href="estilos.css">
    </head>
    <body>
        <form>
        <h2>Volver al Índice</h2>
        <a href="index.html">Inicio</a>
        </form>
    </body>
</html>
