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

                <?php
                    // Recuperar el último minijuego visitado desde la cookie
                    $ultimoMinijuego = isset($_COOKIE['ultimo_minijuego']) ? $_COOKIE['ultimo_minijuego'] : '';
                    // Mostrar el valor de la cookie
                    echo "<p>Último minijuego visitado: $ultimoMinijuego</p>";
                    // Imprimir un campo oculto con el valor del último minijuego
                    echo "<input type='hidden' name='ultimo_minijuego' value='$ultimoMinijuego'>";
                ?>
                <button type="submit">Iniciar Sesión</button>
            </form>
        </div>
    </div>
</body>
</html>
