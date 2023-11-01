<?php
    // Incluye el archivo de configuración de la base de datos y la clase Jesuita
    require_once('../configuracion/config.php');
    require_once('../clases/jesuita.php'); // Para formjesuita.php
    

    // Inicializa la conexión a la base de datos
    $db = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if ($db->connect_error) {
        die("Error de conexión a la base de datos: " . $db->connect_error);
    }

    $jesuita = new Jesuita($db);


    // Procesar la solicitud para agregar un jesuita
    if (isset($_GET['agregarJesuita'])) {
        $idJesuita = $_GET['idJesuita'];
        $nombre = $_GET['nombre'];
        $firma = $_GET['firma'];

        if ($jesuita->agregarJesuita($idJesuita, $nombre, $firma)) { // Proporciona $idJesuita como tercer argumento
            echo "Jesuita agregado con éxito.";
        } else {
            echo "Error al agregar el Jesuita.";
        }
    }


?>
<!DOCTYPE html>
<html>
    <head>
        <title>CRUD de Jesuitas</title>
        <link rel="stylesheet" type="text/css" href="../estilos/estilos.css">
    </head>
    <body>
        <h1>CRUD de Jesuitas</h1>     
        <h2>Agregar Jesuita</h2>
        <form method="get">
            <label>Puesto del Jesuita:</label>
            <input type="text" name="idJesuita" required>
            <label>Nombre:</label>
            <input type="text" name="nombre" required>
            <label>Firma:</label>
            <input type="text" name="firma" required>
            <input type="submit" name="agregarJesuita" value="Agregar Jesuita">
        </form>       
        <h2>Volver a Jesuitas</h2>
        <a href="formjesuita.html">Jesuita</a>
    </body>
</html>