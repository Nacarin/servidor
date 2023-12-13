<?php
session_start();
require_once('configdb.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'];
    $pw = $_POST['pw'];

    $query = $mysqli->prepare("SELECT * FROM admin WHERE correo = ?");
    $query->bind_param("s", $correo);
    $query->execute();
    $result = $query->get_result();

    if ($result) {
        $usuario = $result->fetch_assoc();

        // Mostrar información sobre el resultado de la consulta
        var_dump($usuario);

        if ($usuario && $pw === $usuario['pw']) {
            // Inicio de sesión exitoso
            // Almacenar información en la sesión
            $_SESSION['idUsuario'] = $usuario['idUsuario'];
            $_SESSION['perfil'] = $usuario['perfil']; // Utilizar el perfil desde la base de datos

            // Redirigir según el perfil
            if ($_SESSION['perfil'] == 'S') {
                header("Location: noeseladmin/panel_admin.php");
            } else {
                header('Location: noexiste.html');
            }
        } else {
            header('Location: credenciales_incorrectas.html');
            exit();
        }
    } 
}
?>
