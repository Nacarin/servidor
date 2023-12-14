<?php
    
    define("HOST", "127.0.0.1");
    define("DATABASE", "minijuegos");
    define("USER", "root");
    define("PASSWORD", "");
    
    /*
    define("HOST", "2daw.esvirgua.com");
    define("DATABASE", "user2daw_BD1-14");
    define("USER", "user2daw_14");
    define("PASSWORD", "7J?Y-05f?$0U");
    */
    // Crear la conexión
    $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);

    // Verificar la conexión
    if ($mysqli->connect_error) {
        die("Error en la conexión a la base de datos: " . $mysqli->connect_error);
    }
?>
