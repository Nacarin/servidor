<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Recoger Información</title>
    </head>
    <body>
        <?php
        //  No da error pero se muestra vacio.
            if(isset($_POST['nombre'])){
                $nombre=$_POST['nombre'];
                echo'Nombre:'.$nombre.'<br>';
            }
        //  echo $_POST['opcion']; Da error porque el array no se creo si no se marca la opcion
            if(isset($_POST['opcion'])) {
                $opcion=$_POST['opcion'];
                echo'Eres:'.$opcion.'<br>';
            }
        //  echo $_POST['sql']; Da error porque el array no se creo si no se marca la opcion
            if(isset($_POST['sql'])){
                echo'Tienes competencias en SQL<br>';
            }
        //  echo $_POST['c']; Da error porque el array no se creo si no se marca la opcion    
            if(isset($_POST['c'])){
                echo'Tienes competencias en C<br>';
            }
        //  echo $_POST['java']; Da error porque el array no se creo si no se marca la opcion
            if(isset($_POST['java'])){
                echo'Tienes competencias en JAVA<br>';
            }
        //  echo $_POST['terminos']; Da error porque el array no se creo si no se marca la opcion
            if(isset($_POST['terminos'])){
                echo'Aceptaste los términos y condiciones.<br>';
            }
        ?>
    </body>
</html>