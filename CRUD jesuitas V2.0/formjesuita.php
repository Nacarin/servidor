<?php
// Incluye el archivo de configuración de la base de datos y la clase Jesuita
require_once('config.php');
require_once('Jesuita.php');

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


// Procesar la solicitud para modificar un jesuita
if (isset($_GET['action']) && $_GET['action'] === 'modificarJesuita') {
    $idJesuita = $_GET['idJesuita'];
    
    // Verifica si se desea modificar el nombre
    if (isset($_GET['modificarNombre']) && $_GET['modificarNombre'] == 1) {
        $nombre = $_GET['nombre'];
        if ($jesuita->modificarNombre($idJesuita, $nombre)) {
            echo "Nombre del Jesuita modificado con éxito.";
        } else {
            echo "Error al modificar el nombre del Jesuita.";
        }
    }

    // Verifica si se desea modificar la firma
    if (isset($_GET['modificarFirma']) && $_GET['modificarFirma'] == 1) {
        $firma = $_GET['firma'];
        if ($jesuita->modificarFirma($idJesuita, $firma)) {
            echo "Firma del Jesuita modificada con éxito.";
        } else {
            echo "Error al modificar la firma del Jesuita.";
        }
    }
}


// Procesar la solicitud para borrar un jesuita
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
    <title>CRUD de Jesuitas</title>
</head>
<body>
    <h1>CRUD de Jesuitas</h1>
    
    <h2>Agregar Jesuita</h2>
    <form method="get">
        <label>ID Jesuita:</label>
        <input type="text" name="idJesuita" required>
        <label>Nombre:</label>
        <input type="text" name="nombre" required>
        <label>Firma:</label>
        <input type="text" name="firma" required>
        <input type="submit" name="agregarJesuita" value="Agregar Jesuita">
    </form>
    
    <h1>Seleccionar Jesuita para Modificar</h1>
    <form method="get" action="modificarcamposjesuita.php">
        <label>ID del Jesuita:</label>
        <input type="text" name="idJesuita" required>
        <input type="submit" value="Seleccionar Jesuita">
    </form>


    
    <h2>Borrar Jesuita</h2>
    <form method="get">
        <label>ID Jesuita:</label>
        <input type="text" name="idJesuita" required>
        <input type="submit" name="borrarJesuita" value="Borrar Jesuita">
    </form>
    <h2>Volver al Indice</h2>
    <a href="index.html">Inicio</a>
</body>
</html>
