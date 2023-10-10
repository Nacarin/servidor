<!--David Pozo Berlinches-->
<!DOCTYPE html>
<html>
    <head>
        <title>Resultado de Búsqueda</title>
    </head>
    <body>
        <h1>Resultado de Busqueda</h1>
        <?php
            //Comprobamos si existe el valor nombre          
            if(isset($_POST['nombre'])){
                $nombre=$_POST['nombre'];
                //Conectamos
                $conexion=mysqli_connect('localhost','root','','jesuitas');

                //Realizamos la consulta
                //$sql="select * from jesuita where nombre like '%$nombre%'"; En esta forma si no pongo una condicion me muestra todos los jesuitas de la base de datos al no enviar nada
                
                $sql='select * from jesuita where nombre ='."'$nombre'";               
                //echo $sql; Si tenemos algun error lo mejor es hacerle un echo a la variable
                $consulta=mysqli_query($conexion,$sql);
                if($nombre==NULL){//Comprobamos si la variable no esta vacia
                    echo "<h2>Jesuita No Encontrado</h2>";
                    echo 'No se ha introducido ningun nombre';
                }else if(mysqli_num_rows($consulta)==0){//Comprobamos si existen jesuitas con ese nombre
                    echo "<h2>Jesuita No Encontrado</h2>";
                    echo "No se encontraron Jesuitas con ese nombre.";
                }else
                {   //Si lo encuentra lo mostramos junto a su firma
                    if($fila=mysqli_fetch_array($consulta)) {
                        echo "<h2>Jesuita Encontrado</h2>";
                        echo "NOMBRE: ".$fila['nombre']."<br>";
                        echo "FIRMA: ".$fila['firma']."<br>";
                    }                   
                }  
                //Ceramos la conexion
                mysqli_close($conexion);           
            }
            if(isset($_POST['firma'])){
                $firma=$_POST['firma'];
                
                $conexion=mysqli_connect('localhost','root','','jesuitas');

                $sql="select * from jesuita where firma like '%$firma%'"; 
                             
                $consulta=mysqli_query($conexion,$sql);
                if($firma==NULL){
                    echo "<h2>Firma No Encontrada</h2>";
                    echo '<br>No se ha introducido ninguna firma a buscar';
                }else if(mysqli_num_rows($consulta)==0){
                    echo "<h2>Firma No Encontrada</h2>";
                    echo "<br>No se encontraron ninguna firma con ese patron.";
                }else
                {   
                    while($fila=mysqli_fetch_array($consulta)) {
                        echo "<h2>Firma Encontrada</h2>";
                        echo "NOMBRE: ".$fila['nombre']."<br>";
                        echo "FIRMA: ".$fila['firma']."<br>";
                    }                   
                }  
                //Ceramos la conexion
                mysqli_close($conexion);           
            }

        ?>
    </body>
</html>

<!--
    while($fila=mysqli_fetch_array($consulta)) {
        echo "<h2>Jesuita Encontrado</h2>";
        echo "NOMBRE: ".$fila['nombre']."<br>";
        echo "FIRMA: ".$fila['firma']."<br>";
    }  
-->

