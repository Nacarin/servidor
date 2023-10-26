<?php
    // Configuración de la base de datos
    $db_host = '2daw.esvirgua.com';  // Dirección IP o nombre del servidor de la base de datos
    $db_name = 'user2daw_BD1-14';   // Nombre de la base de datos
    $db_user = 'user2daw_14';      // Nombre de usuario de la base de datos
    $db_pass = '7J?Y-05f?$0U';           // Contraseña de usuario de la base de datos (en este caso, está vacía)

    // Se intenta establecer una conexión a la base de datos usando la extensión MySQLi.
    $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

    // Verificar la conexión
    if ($mysqli->connect_error) {
        die('Error de conexión a la base de datos: ' . $mysqli->connect_error);
    }

?>
