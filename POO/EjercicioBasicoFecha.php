<?php
    class FechaPersonalizada {
        private $fecha;

        // Definición del array de meses
        private $meses = [
            1 => ['Enero', 31],
            2 => ['Febrero', 28],
            3 => ['Marzo', 31],
            4 => ['Abril', 30],
            5 => ['Mayo', 31],
            6 => ['Junio', 30],
            7 => ['Julio', 31],
            8 => ['Agosto', 31],
            9 => ['Septiembre', 30],
            10 => ['Octubre', 31],
            11 => ['Noviembre', 30],
            12 => ['Diciembre', 31]
        ];

        public function __construct($fecha) {
            $this->fecha=$fecha;
        }


        // Metodo para verificar si el año es bisiesto
        public function esBisiesto($anio) {
            return($anio % 4==0 && ($anio % 100 != 0 || $anio % 400 == 0));
        }

        // Metodo para mostrar la fecha en el formato deseado y el número de dias en el mes
        public function mostrarFechaPersonalizada() {
            $partes=explode('/', $this->fecha); // Descompone la cadena de la fecha ($this->fecha) en un array de partes utilizando el caracter de barra diagonal ("/") como el delimitador.

            if(count($partes)!= 3){
                echo "Formato de fecha incorrecto. Debe ser dd/mm/aaaa.";
                return;
            }
            
            list($dia,$mes,$anio)=$partes; //Asigna los valores contenidos en un array a variables individuales.

            if(!is_numeric($dia) || !is_numeric($mes) || !is_numeric($anio)){ //Comprueba si las variables $dia, $mes y $anio son numericas
                echo "Los valores de dia, mes y año deben ser numeros.";
                return;
            }

            if($mes<1 || $mes>12) { //Comprueba si la variable $mes esta entre 1 y 12
                echo "El mes debe estar entre 1 y 12.";
                return;
            }

            $diasEnMes=$this->meses[$mes][1];
            
            // Comprobamos si el año es bisiesto y ajustamos el numero de días en febrero si es necesario
            if($mes==2 && $this->esBisiesto($anio)) {
                $diasEnMes=29;
            }

      
            if($dia<1 || $dia>$this->meses[$mes][1]) { //Comprueba que el dia es mayor a 0 y si el valor de la variable $dia es mayor que el número de dias en el mes especificado
                echo "El dia ingresado no es valido para el mes y año especificados.";
                return;
            }

            $nombreMes=$this->meses[$mes][0];

            echo"Fecha en formato personalizado: $dia/$nombreMes/$anio<br>";
            echo"Numero de dias en el mes: $diasEnMes";
        }
    }

    // Ejemplo

    $fecha=new FechaPersonalizada("2/2/2020");
    $fecha->mostrarFechaPersonalizada();
?>