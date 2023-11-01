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

    // Procesar la solicitud para agregar un lugar
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
    
?>


<!DOCTYPE html>
<html>
    <head>
        <title>CRUD de Lugares</title>
        <link rel="stylesheet" type="text/css" href="../estilos/estilos.css">
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
        <h2>Volver a Lugares</h2>
        <a href="formlugar.php">Lugar</a>
    </body>
</html>