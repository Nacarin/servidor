<?php
require_once('../configuracion/config.php');
require_once('../clases/lugar.php');

$db = new mysqli($db_host, $db_user, $db_pass, $db_name);
$lugar = new Lugar($db);

if ($db->connect_error) {
    die("Error de conexión a la base de datos: " . $db->connect_error);
}

if (isset($_POST['modificarLugar'])) {
    $ip = $_POST['ip'];
    $lugarNombre = $_POST['lugar'];
    $descripcion = $_POST['descripcion'];

    // Actualizar el lugar con los nuevos datos
    $lugarActualizado = $lugar->modificarLugar($ip, $lugarNombre, $descripcion);

    if ($lugarActualizado) {
        header("Location: formlugar.php");
        exit();
    } else {
        echo 'Error al intentar actualizar el lugar.';
    }
}
?>

<!DOCTYPE html>
    <html>
    <head>
        <title>Actualizar Lugar</title>
        <link rel="stylesheet" type="text/css" href="../estilos/estilos.css">
    </head>
    <body>
        <form>
        </form>
        <form>
            <h2>Volver al Índice</h2>
            <a href="./formlugar.php">Lugares</a>
        </form>
    </body>
</html>

