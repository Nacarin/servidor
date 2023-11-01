<?php
    // Incluye el archivo de configuración de la base de datos y la clase Lugar
    require_once('../configuracion/config.php');
    require_once('../clases/lugar.php'); // Para formlugar.php
    

    // Inicializa la conexión a la base de datos
    $db = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if ($db->connect_error) {
        die("Error de conexión a la base de datos: " . $db->connect_error);
    }

    $lugar = new Lugar($db);

    
?>


<!DOCTYPE html>
<html>
    <head>
        <title>CRUD de Lugares</title>
        <link rel="stylesheet" type="text/css" href="../estilos/estilos.css">
    </head>
    <body>
        <h2>Agregar Lugar</h2>
        <a href="agregarlugar.php">Agregar Lugar</a>
        <br/>
        <h2>Listar Lugares</h2>
        <form method="get" action="listarlugar.php">
            <input type="submit" name="listarLugares" value="Listar Lugares">
        </form>
        <h2>Volver al Índice</h2>
        <a href="../index.html">Inicio</a>
    </body>
</html>