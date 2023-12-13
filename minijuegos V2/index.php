<?php
    session_start();
    require_once('configdb.php');

    $query = "SELECT COUNT(*) as total FROM admin";
    $result = $mysqli->query($query);

    if ($result && $result->fetch_assoc()['total'] === '0') {
        // No hay administradores, redirigir a la página de alta de administrador
        header('Location: instalador.php');
    } else {
        // Hay administradores, redirigir a la página principal
        header('Location: principal.html');
    }

    exit();
?>
