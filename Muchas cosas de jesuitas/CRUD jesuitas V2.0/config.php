<?php
    // Configuración de la base de datos
    $db_host = '127.0.0.1';
    $db_name = 'jesuitas';
    $db_user = 'root';
    $db_pass = '';

    try {
        $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Error de conexión a la base de datos: ' . $e->getMessage();
    }
?>