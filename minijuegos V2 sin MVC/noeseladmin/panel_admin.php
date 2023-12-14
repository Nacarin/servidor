<?php
// Verificar la sesión
session_start();

// Verificar si hay una sesión activa y si el perfil es 0 (administrador)
if (!isset($_SESSION['idUsuario']) || $_SESSION['perfil'] !== 'S') {
    // Si no hay una sesión activa o el perfil no es 0, redirigir al formulario de inicio de sesión
    header('Location: ../inicio_sesion.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Panel de Administrador</title>
        <link rel="stylesheet" href="../estilos.css">
    </head>
    <body>
        <div class="contenedor">
            <div class="formulario">
                <form action="../procesar_alta_admin_minijuego.php" method="post">
                    <h2>Admin De Minijuego</h2>
                    <label for="correo">Correo:</label>
                    <input type="text" name="correo" required>
                    <label for="pw">Contraseña:</label>
                    <input type="password" name="pw" required>
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" required>
                    <button type="submit">Dar de Alta</button>
                </form>
                <div class="salir">
                    <form action="../inicio_sesion.php" method="post">
                        <button type="submit">Salir</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
