<?php
    $colores = array("azul","negro","rojo");
    /*

    echo "Mostrar datos del array:<br>";
    //echo $colores; Esto no funciona con arrays
    print_r($colores);
    echo "<br>";
    echo var_dump($colores);
    //foreach($colores as $valor)

    */
    //Array numerico y recorrer con for
    echo "Array numerico con for";
    echo "<br><br>";
    for($i=0;$i<=count($colores)-1;$i++){
        echo $colores[$i];
        echo "<br>";
    }

    //Array numerico y recorrer con foreach
    echo "<br>Array numerico con foreach de forma completa<br>";
    foreach($colores as $indice=>$informacion){
        echo "<br>";
        echo "El indice:".$indice." tiene el valor:".$informacion;
    }

    echo "<br><br>";
    //Eliminamos el indice 2
    echo "Uso del unset para borrar el indice 2<br>";
    unset($colores[2]);
    echo "<br>";
    
    for($i=0;$i<=count($colores)-1;$i++){
        echo $colores[$i];
        echo "<br>";
    }
    echo "<br><br>";

    //Array asociativo y foreach de forma abreviada 
    echo "Array asociativo con foreach de forma abreviada<br>";
    
    $alumno["nombre"] = "David Pozo";
    $alumno ["telefono"] ="644123456";
    $alumno ["correo"] ="davidpozo@gmail.com";
    //lo recorremos
    foreach($alumno as $informacion){
        echo "<br>";
        echo $informacion;      
    }
    echo "<br><br>";

    //Array asociativo y foreach forma completa
    echo "Array asociativo con foreach de forma completa<br>";

    foreach($alumno as $indice=>$informacion){
        echo "<br>";
        echo $indice." tiene el valor:".$informacion;
    }

    
?>