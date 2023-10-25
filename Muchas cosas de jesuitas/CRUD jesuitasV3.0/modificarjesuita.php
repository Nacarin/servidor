<?php
    // Incluye el archivo de configuración de la base de datos y la clase Jesuita
    require_once('config.php');
    require_once('jesuita.php');

    $db = new mysqli($db_host, $db_user, $db_pass, $db_name);
    $jesuita = new Jesuita($db);

    if ($db->connect_error) {
        die("Error de conexión a la base de datos: " . $db->connect_error);
    }

    // Procesar la solicitud para modificar el Jesuita
    if (isset($_GET['modificarJesuita'])) {
        $idJesuita = $_GET['idJesuita'];
        $nombre = $_GET['nombre'];
        $firma = $_GET['firma'];

        if ($jesuita->modificarJesuita($idJesuita, $nombre, $firma)) {
            echo "Jesuita modificado con éxito.";
        } else {
            echo "Error al modificar el Jesuita.";
        }
    }
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Modificar Jesuita</title>
        <link rel="stylesheet" type="text/css" href="estilos.css">
    </head>
    <body>
        <h1>Modificar Jesuita</h1>
        <form method="get">
            <label>ID Jesuita:</label>
            <input type="text" name="idJesuita" required>
            <label>Nuevo Nombre:</label>
            <input type="text" name="nombre" required>
            <label>Nueva Firma:</label>
            <input type="text" name="firma" required>
            <input type="submit" name="modificarJesuita" value="Modificar Jesuita">
        </form>
        <h2>Volver al Índice</h2>
        <a href="index.html">Inicio</a>
    </body>
</html>
