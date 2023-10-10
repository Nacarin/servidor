<!-- David Pozo Berlinches-->
<?php
    $n=0;
    function calcularFactorial($n){
        if($n==0){
            return 1;
        }else{
            return $n*calcularFactorial($n-1);
        }
    }
?>
