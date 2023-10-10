<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>TAR.02.02</title>
        <link rel="stylesheet" href="estilo.css">
    </head>
    <body>
        <?php
        $carpeta="imagenes";

        $arrayimagenes[0][0]=$carpeta."\atardecer.jpg";
        $arrayimagenes[0][1]="atardecer";
        $arrayimagenes[1][0]=$carpeta."\flores.jpg";
        $arrayimagenes[1][1]="flores";
        $arrayimagenes[2][0]=$carpeta."\hielo.jpg";
        $arrayimagenes[2][1]="hielo";
        $arrayimagenes[3][0]=$carpeta."\lago.jpg";
        $arrayimagenes[3][1]="lago";
        $arrayimagenes[4][0]=$carpeta."\montaña.jpg";
        $arrayimagenes[4][1]="montaña";
        $arrayimagenes[5][0]=$carpeta."\morado.jpg";
        $arrayimagenes[5][1]="morado";
        $arrayimagenes[6][0]=$carpeta."\nubes.jpg";
        $arrayimagenes[6][1]="nubes";


        for($i=0;$i<7;$i++){
            for($j=0;$j<2;$j++){
                echo '<img src="'.$arrayimagenes[$i][$j].'"/>';
                echo $arrayimagenes[$i][1];
            }
        }

        //echo '<img src="'.$arrayimagenes[0][0].'"/>';
        

        ?>
    </body>
</html>