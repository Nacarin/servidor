<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="contenedor">
        <div class="formulario">
            <form action="procesar_login.php" method="post">
                <h2>Iniciar Sesión</h2>
                <label for="correo">Correo:</label>
                <input type="text" name="correo" required>
                <label for="pw">Contraseña:</label>
                <input type="password" name="pw" required>
                <button type="submit">Iniciar Sesión</button>
            </form>
        </div>
    </div>
</body>
</html>
