<?php
    // Iniciar sesión al principio del archivo
    session_start();

    // Conexión a la base de datos
    require_once('configdb.php');

    // Recibir datos del formulario
    $correo = $_POST['correo'];
    $pw = $_POST['pw'];

    // Recuperar el último minijuego visitado
    $ultimoMinijuego = isset($_POST['ultimo_minijuego']) ? $_POST['ultimo_minijuego'] : '';

    $query = "SELECT * FROM tUsuario WHERE correo = '$correo'";
    $result = $mysqli->query($query);

    if ($result && ($usuario = $result->fetch_assoc()) && $pw === $usuario['pw']) {
        // Inicio de sesión exitoso
        // Almacenar información en la sesión
        $_SESSION['idUsuario'] = $usuario['idUsuario'];
        $_SESSION['perfil'] = $usuario['perfil']; // Utilizar el perfil desde la base de datos

        // Redirigir según el perfil
        if ($_SESSION['perfil'] == '0') {
            header("Location: noeseladmin/panel_admin.php?minijuego=$ultimoMinijuego");
        } elseif ($_SESSION['perfil'] == '1') {
            header('Location: buscaminas.php');
        } elseif ($_SESSION['perfil'] == '2') {
            header('Location: tresenraya.php');
        } else {
            header('Location: noexiste.html');
        }
    } else {
        // Credenciales incorrectas, redirigir al formulario de inicio de sesión con mensaje de error
        header('Location: credenciales_incorrectas.html');
        exit();
    }
?>
