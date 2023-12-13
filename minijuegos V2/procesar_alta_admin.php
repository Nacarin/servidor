<?php
session_start();
require_once('configdb.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'];
    $pw = $_POST['pw'];
    $nombre = $_POST['nombre'];

    // Perfil de administrador
    $perfil = 'S';

    $query = $mysqli->prepare("INSERT INTO admin (correo, pw, nombre, perfil) VALUES (?, ?, ?, ?)");

    if ($query) {
        $query->bind_param("ssss", $correo, $pw, $nombre, $perfil);
        $query->execute();

        // Redirigir o realizar otras acciones después del alta
        header('Location: inicio_sesion.php');
        exit();
    } else {
        die("Error en la consulta: " . $mysqli->error);
    }
}
?>
