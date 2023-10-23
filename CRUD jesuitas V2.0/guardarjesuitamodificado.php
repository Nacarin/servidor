<?php
require_once('config.php');
require_once('Jesuita.php');

$db = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($db->connect_error) {
    die("Error de conexión a la base de datos: " . $db->connect_error);
}

$jesuita = new Jesuita($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['idJesuita']) && isset($_POST['campo']) && isset($_POST['nuevoValor'])) {
        $idJesuita = $_POST['idJesuita'];
        $campo = $_POST['campo'];
        $nuevoValor = $_POST['nuevoValor'];

        // A continuación, realizamos la consulta SQL para actualizar el campo específico en la base de datos.
        // Asegúrate de validar y escapar adecuadamente los valores antes de construir la consulta en tu aplicación.

        $query = "UPDATE jesuita SET $campo = '$nuevoValor' WHERE idJesuita = $idJesuita";

        if ($db->query($query)) {
            echo "Jesuita modificado con éxito.";
        } else {
            echo "Error al modificar el Jesuita: " . $db->error;
        }
    } else {
        echo "ID de Jesuita, campo o nuevo valor no proporcionados.";
    }
}
?>
