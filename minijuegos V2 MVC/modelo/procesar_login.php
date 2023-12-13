<?php

class ProcesarLogin {
    private $conexion;

    function __construct() {
        $this->conexion = $this->conexion();
    }

    public function conexion() {
        $this->conexion = new mysqli(HOST, USER, PASSWORD, DATABASE);
        $this->conexion->set_charset('utf8');

        return $this->conexion;
    }

    public function verificarCredenciales($correo, $pw) {
        $stmt = $this->conexion->prepare("SELECT pw FROM admin WHERE correo = ?");
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $stmt->bind_result($contrasenaAlmacenada);
        $stmt->fetch();
        $stmt->close();

        if ($contrasenaAlmacenada && $contrasenaAlmacenada === $pw) {
            // Almacenar el ID del usuario en la sesión
            $_SESSION['idUsuario'] = $usuario;
            return true; // Credenciales válidas
        }
    
        return false; // Credenciales inválidas
    }
}
?>




