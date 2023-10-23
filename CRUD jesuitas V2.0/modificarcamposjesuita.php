<?php
if(isset($_GET['idJesuita'])) {
    $idJesuita = $_GET['idJesuita'];
    // Aquí, obtén los detalles del Jesuita según el $idJesuita de la base de datos.
    // Esto incluirá los campos disponibles para modificar, como nombre, firma, etc.

    // Simulación de los campos disponibles:
    $camposDisponibles = ['nombre', 'firma'];
}
else {
    echo "ID de Jesuita no proporcionado.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Elegir Campos a Modificar</title>
</head>
<body>
    <h1>Elegir Campos para Modificar</h1>
    <form method="get" action="modificacionjesuitafinal.php">
        <input type="hidden" name="idJesuita" value="<?php echo $idJesuita; ?>">
        <p>Seleccione los campos para modificar:</p>
        <?php
        foreach($camposDisponibles as $campo) {
            echo "<input type='checkbox' name='campos[]' value='$campo'>$campo<br>";
        }
        ?>
        <input type="submit" value="Continuar">
    </form>
</body>
</html>
