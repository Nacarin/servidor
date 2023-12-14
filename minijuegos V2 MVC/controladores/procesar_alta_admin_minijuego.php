<?php
session_start();
require_once('configdb.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'];
    $raw_pw = $_POST['pw'];
    $nombre = $_POST['nombre'];

    // Perfil de administrador de minijuego
    $perfil = 'M';

    // Encriptar la contraseña
    $hashed_pw = password_hash($raw_pw, PASSWORD_DEFAULT);

    $query = $mysqli->prepare("INSERT INTO admin (correo, pw, nombre, perfil) VALUES (?, ?, ?, ?)");

    if ($query) {
        $query->bind_param("ssss", $correo, $hashed_pw, $nombre, $perfil);
        $query->execute();

        // Redirigir o realizar otras acciones después del alta
        header('Location: noeseladmin/panel_admin.php');
        exit();
    } else {
        die("Error en la consulta: " . $mysqli->error);
    }
}
?>
