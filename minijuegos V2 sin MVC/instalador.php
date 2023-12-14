<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alta de Administrador</title>
        <link rel="stylesheet" href="estilos.css">
    </head>
    <body>
        <div class="contenedor">
            <div class="formulario">
                <form action="procesar_alta_admin.php" method="post">
                    <h2>Alta de Administrador</h2>
                    <label for="correo">Correo:</label>
                    <input type="text" name="correo" required>
                    <label for="pw">Contraseña:</label>
                    <input type="password" name="pw" required>
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" required>
                    <button type="submit">Dar de Alta</button>
                </form>
            </div>
        </div>
    </body>
</html>
