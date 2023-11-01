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


    //Buscar jesuita
    if (isset($_GET['buscarJesuita'])) {
        $idJesuitaBuscar = $_GET['idJesuitaBuscar'];
        $jesuitaEncontrado = $jesuita->buscarJesuitaPorID($idJesuitaBuscar);
    
        // Agregar un enlace para modificar el Jesuita encontrado
        if ($jesuitaEncontrado) {
            echo '<h2>Resultado de la búsqueda</h2>';
            echo '<p>Nombre: ' . $jesuitaEncontrado['nombre'] . '</p>';
            echo '<p>Firma: ' . $jesuitaEncontrado['firma'] . '</p>';
            // Agregar enlace a la página de modificación
            echo '<a href="modificarjesuita.php?idJesuitaModificar=' . $idJesuitaBuscar . '">Modificar Jesuita</a>';
        } else {
            echo 'No se encontró un Jesuita con el ID proporcionado.';
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
        <h2>Buscar Jesuita por ID</h2>
        <form method="get" action="modificarjesuita.php">
            <label>ID Jesuita:</label>
            <input type="text" name="idJesuitaBuscar" required>
            <input type="submit" name="buscarJesuita" value="Buscar Jesuita">
        </form>     
        <h2>Volver a Jesuitas</h2>
        <a href="formjesuita.html">Jesuitas</a>
    </body>
</html>