<!--David Pozo Berlinches-->
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>V1</title>
        <link rel="stylesheet" href="estilos.css">
    </head>
    <body>
        <?php
            $carpeta="imagenes";
            $arrayimagenes[0][0]=$carpeta."\atardecer.jpg";
            $arrayimagenes[0][1]="atardecer";
            $arrayimagenes[1][0]=$carpeta."\hielo.jpg";
            $arrayimagenes[1][1]="hielo";
            $arrayimagenes[2][0]=$carpeta."\lago.jpg";
            $arrayimagenes[2][1]="lago";
            $arrayimagenes[3][0]=$carpeta."\montania.jpg";
            $arrayimagenes[3][1]="montania";
            $arrayimagenes[4][0]=$carpeta."\morado.jpg";
            $arrayimagenes[4][1]="morado";

            for($i=0;$i<5;$i++) {
                echo '<div class="contenedor">';
                echo '<img src="'.$arrayimagenes[$i][0].'"/>';
                echo '<p>'.$arrayimagenes[$i][1].'</p>';
                echo '</div>';
            }
        ?>
    </body>
</html>