<?php
// Verificar la sesión
session_start();
if (!isset($_SESSION['idUsuario']) || $_SESSION['perfil'] !== '1') {
    // Si no hay una sesión activa o el perfil no es 1 (buscaminas), redirigir al formulario de inicio de sesión
    header('Location: inicio_sesion.php');
    exit();
}
?>
<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Buscaminas</title>
        <link rel="stylesheet" href="estilos.css">
    </head>
    <body>
        <div class="contenedor">
            <p>Buscaminas</p>
            <form action="cerrar_sesion.php" method="post">
                <button type="submit">Cerrar Sesión</button>
            </form>
        </div>
    </body>
</html>
