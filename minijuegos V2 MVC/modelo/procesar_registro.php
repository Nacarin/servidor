<?php

    class ProcesarRegistro{

        private $conexion;

        function __construct() {
            $this->conexion = $this->conexion();
        }
    
        public function conexion() {
            $this->conexion = new mysqli(HOST, USER, PASSWORD, DATABASE);
            $this->conexion->set_charset('utf8');
    
            return $this->conexion;
        }

        public function registro(){
            // Recibir datos del formulario
            $correo = $_POST['correo'];
            $pw = $_POST['pw']; // No se utiliza password_hash

            $nombre = $_POST['nombre'];

            // Perfil por defecto "2"
            $perfil = $_POST['perfil'];

            // Consulta preparada para evitar SQL injection
            $query = $mysqli->prepare("INSERT INTO tUsuario (correo, pw, nombre, perfil) VALUES (?, ?, ?, ?)");

            // Verificar si la preparación de la consulta fue exitosa
            if ($query) {
                $query->bind_param("ssss", $correo, $pw, $nombre, $perfil);
                $query->execute();

                // Redirigir al usuario después del registro
                header('Location: inicio_sesion.php');
                exit();
            } else {
                die("Error en la consulta: " . $mysqli->error);
            }
    }
    }
?>
