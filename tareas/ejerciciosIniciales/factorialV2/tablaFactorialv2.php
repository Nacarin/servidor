<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Tabla Factorial</title>
    </head>
    <body>
        <?php
            //include 'factorial.php';   
            require 'factorial.php';
            $min=$_GET["min"];
            $max=$_GET["max"];

            $intermedia=0;

            if($min>$max){
                $intermedia=$min;
                $min=$max;
                $max=$intermedia;
            }

            echo "<table border='1'>";
            echo "<tr><th colspan=2>TABLA DE FACTORIALES DEL $min AL $max</th></tr>";
            echo "<tr><td>NUMERO</td><td>FACTORIAL</td></tr>";

            for ($i=$min;$i<=$max;$i++) {
                echo "<tr><td>$i</td><td>".calcularFactorial($i)."</td></tr>";
            }
            echo "<tr><th colspan=2>Nombre del Alumno: David Pozo Berlinches</th></tr>";
            echo "</table>";     
        ?>
    </body>
</html>