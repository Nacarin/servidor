<?php
if(isset($_GET['idJesuita']) && isset($_GET['campos']) && is_array($_GET['campos'])) {
    $idJesuita = $_GET['idJesuita'];
    $campos = $_GET['campos'];

    // Aquí, obtén los detalles actuales del Jesuita desde la base de datos.

    // Simulación de los detalles actuales:
    $jesuita = [
        'nombre' => 'Nombre Actual',
        'firma' => 'Firma Actual'
    ];
}
else {
    echo "ID de Jesuita o campos no proporcionados.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modificar Jesuita</title>
</head>
<body>
    <h1>Modificar Jesuita</h1>
    <form method="get" action="guardarjesuitamodificado.php">
        <input type="hidden" name="idJesuita" value="<?php echo $idJesuita; ?>">
        <p>Modificar los siguientes campos:</p>
        <?php
        foreach($campos as $campo) {
            echo "<label>$campo:</label>";
            echo "<input type='text' name='$campo' value='" . $jesuita[$campo] . "'><br>";
        }
        ?>
        <input type="submit" value="Guardar Modificaciones">
    </form>
</body>
</html>
