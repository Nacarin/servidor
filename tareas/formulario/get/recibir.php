<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Recoger Información</title>
    </head>
    <body>
        <?php
        //  No da error pero se muestra vacio.
            if(isset($_GET['nombre'])){
                $nombre=$_GET['nombre'];
                echo'Nombre:'.$nombre.'<br>';
            }
        //  echo $_GET['opcion']; Da error porque el array no se creo si no se marca la opcion
            if(isset($_GET['opcion'])) {
                $opcion=$_GET['opcion'];
                echo'Eres:'.$opcion.'<br>';
            }
            $programa=$_GET['programa'];
            foreach($programa as $valor){
                echo 'Tienes competencia sobre '.$valor.'<br>';
            }
        /*
        //  echo $_GET['sql']; Da error porque el array no se creo si no se marca la opcion
            if(isset($_GET['sql'])){
                echo'Tienes competencias en SQL<br>';
            }
        //  echo $_GET['c']; Da error porque el array no se creo si no se marca la opcion    
            if(isset($_GET['c'])){
                echo'Tienes competencias en C<br>';
            }
        //  echo $_GET['java']; Da error porque el array no se creo si no se marca la opcion
            if(isset($_GET['java'])){
                echo'Tienes competencias en JAVA<br>';
            }
        */
        //  echo $_GET['terminos']; Da error porque el array no se creo si no se marca la opcion
            if(isset($_GET['terminos'])){
                echo'Aceptaste los términos y condiciones.<br>';
            }
        ?>
    </body>
</html>

