<?php
// Verificar la sesión
session_start();
if (!isset($_SESSION['idUsuario']) || $_SESSION['perfil'] !== '2') {
    // Si no hay una sesión activa o el perfil no es 2 (Tres en Raya), redirigir al formulario de inicio de sesión
    header('Location: inicio_sesion.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tres en Raya</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="contenedor">
        <p>Tres en Raya</p>
        <form action="cerrar_sesion.php" method="post">
            <button type="submit">Cerrar Sesión</button>
        </form>
    </div>
</body>
</html>
