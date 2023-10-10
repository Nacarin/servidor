<!--David Pozo Berlinches-->
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>V2</title>
        <link rel="stylesheet" href="estilos.css">
    </head>
    <body>
        <?php
            $carpeta="imagenes";
            $arrayimagenes=array(
                "atardecer"=>$carpeta."/atardecer.jpg",
                "hielo"=>$carpeta."/hielo.jpg",
                "lago"=>$carpeta."/lago.jpg",
                "montania"=>$carpeta."/montania.jpg",
                "morado"=>$carpeta."/morado.jpg"
            );

            foreach($arrayimagenes as $nombre=>$url) {
                echo '<div class="contenedor">';
                echo '<img src="'.$url.'"/>';
                echo '<p>'.$nombre.'</p>';
                echo '</div>';
            }
        ?>
    </body>
</html>
