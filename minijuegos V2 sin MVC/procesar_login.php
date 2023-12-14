<?php
    // Iniciar sesión al principio del archivo
    session_start();
    require_once('configdb.php');
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $correo = $_POST['correo'];
        $raw_pw = $_POST['pw']; // Contraseña sin encriptar
    
        $query = $mysqli->prepare("SELECT * FROM admin WHERE correo = ?");
        $query->bind_param("s", $correo);
        $query->execute();
        $result = $query->get_result();
    
        if ($result && ($usuario = $result->fetch_assoc()) && password_verify($raw_pw, $usuario['pw'])) {
            // Inicio de sesión exitoso
            // Almacenar información en la sesión
            $_SESSION['idUsuario'] = $usuario['idUsuario'];
            $_SESSION['perfil'] = $usuario['perfil']; // Utilizar el perfil desde la base de datos
    
            // Redirigir según el perfil
            if ($_SESSION['perfil'] == 'S') {
                header("Location: noeseladmin/panel_admin.php");
            } else {
                header('Location: vista_admin_minijuego.php');
            }
        } else {
            // Credenciales incorrectas, redirigir al formulario de inicio de sesión con mensaje de error
            header('Location: credenciales_incorrectas.html');
            exit();
        }
    }
?>
