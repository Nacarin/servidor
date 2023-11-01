<?php
    require_once('../configuracion/config.php');
    require_once('../clases/lugar.php');

    $db = new mysqli($db_host, $db_user, $db_pass, $db_name);
    $lugar = new Lugar($db);

    if ($db->connect_error) {
        die("Error de conexión a la base de datos: " . $db->connect_error);
    }

    // Verifica si se ha enviado una IP a través del método GET
    if (isset($_GET['ip'])) {
        $ip = $_GET['ip'];
        
        // Busca un lugar en la base de datos usando la IP proporcionada
        $lugarEncontrado = $lugar->buscarLugarPorIP($ip);

        // Verifica si se encontró un lugar con la IP proporcionada
        if ($lugarEncontrado) {
            // Muestra los detalles del lugar encontrado y confirma la eliminación
            echo '<h2>Confirmar eliminación</h2>';
            echo '<p>IP: ' . $lugarEncontrado['ip'] . '</p>';
            echo '<p>Nombre del Lugar: ' . $lugarEncontrado['lugar'] . '</p>';
            echo '<p>Descripción: ' . $lugarEncontrado['descripcion'] . '</p>';
            echo '<p>¿Estás seguro de que deseas eliminar este lugar?</p>';
            echo '<a href="borrarlugar.php?confirmar=true&ip=' . $lugarEncontrado['ip'] . '">Sí, eliminar</a>';
            echo '<a href="formlugar.php">No, volver</a>';
        } else {
            // Si no se encuentra un lugar con la IP proporcionada, muestra un mensaje de error
            echo 'No se encontró un Lugar con la IP proporcionada.';
        }
    }

    // Confirmación para eliminar el lugar
    if (isset($_GET['confirmar']) && $_GET['confirmar'] == 'true') {
        $ip = $_GET['ip'];

        // Borrar el lugar por su IP
        $lugarEliminado = $lugar->borrarLugar($ip);

        if ($lugarEliminado) {
            header("Location: formlugar.php");
            exit();
        } else {
            echo 'Error al intentar eliminar el lugar.';
        }
    }
?>



