<?php
    // Iniciar sesión
    session_start();

    // Destruir todas las variables de sesión
    session_destroy();

    // Redirigir a la página de inicio de sesión
    header('Location: inicio_sesion.php');
    exit();
?>
