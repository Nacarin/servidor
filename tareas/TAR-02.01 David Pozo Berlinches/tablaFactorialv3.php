<!-- David Pozo Berlinches-->
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Tabla Factorial</title>
    </head>
    <body>
        <?php
            //Esto oculta los errores
            error_reporting(0);
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
        ?>
    <!-- <form action="#" method="get"> Esto te manda a la misma pagina--> 
        <form action="tablaFactorialv3.php" method="get">
            <label for="min">Valor minimo:</label>
            <input type="number" id="min" name="min" required>
            <br>
            <label for="max">Valor maximo:</label>
            <input type="number" id="max" name="max" required>
            <br>
            <input type="submit" value="Calcular">
        </form>    
            
         <?php   
            
            echo "<table border='1'>";
            echo "<tr><th colspan=2>TABLA DE FACTORIALES DEL $min AL $max</th></tr>";
            echo "<tr><td>NUMERO</td><td>FACTORIAL</td></tr>";

            //Creamos un array vacio
            $array=[];
            
            //En este for rellenamos el array con el resultado que devuelve la funcion calcularFactorial
            for ($i=$min;$i<=$max;$i++) {
                $array[$i]=calcularFactorial($i);
                echo "<tr><td>$i</td><td>".$array[$i]."</td></tr>";
            }
            echo "<tr><th colspan=2>Nombre del Alumno: David Pozo Berlinches</th></tr>";
            echo "</table>";  

            //A partir de aqui mostramos de 2 formas el contenido del array
            print_r($array); 
            foreach($array as $indice=>$factorial){
                echo "<br>";
                echo "El indice:".$indice." tiene el valor:".$factorial;
            }  
        ?>
    </body>
</html>