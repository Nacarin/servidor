<?php
    // Iniciar sesión al principio del archivo
    session_start();
    
    // Conexión a la base de datos
    require_once('configdb.php');
    
    // Recibir datos del formulario
    $correo = $_POST['correo'];
    $raw_pw = $_POST['pw']; // Contraseña sin encriptar
    
    // Encriptar la contraseña
    $hashed_pw = password_hash($raw_pw, PASSWORD_DEFAULT);
    
    $nombre = $_POST['nombre'];
    
    $perfil = $_POST['perfil'];
    
    // Consulta preparada para evitar SQL injection
    $query = $mysqli->prepare("INSERT INTO admin (correo, pw, nombre, perfil) VALUES (?, ?, ?, ?)");
    
    // Verificar si la preparación de la consulta fue exitosa
    if ($query) {
        $query->bind_param("ssss", $correo, $hashed_pw, $nombre, $perfil);
        $query->execute();
    
        // Redirigir al usuario después del registro
        header('Location: inicio_sesion.php');
        exit();
    } else {
        die("Error en la consulta: " . $mysqli->error);
    }
?>
