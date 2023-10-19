<?php
class Lugar
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function agregarLugar($ip, $lugar, $descripcion)
    {
        $ip = $this->escapar($ip);
        $lugar = $this->escapar($lugar);
        $descripcion = $this->escapar($descripcion);

        $query = "INSERT INTO lugar (ip, lugar, descripcion) VALUES ('$ip', '$lugar', '$descripcion')";

        if ($this->db->query($query)) {
            return true; // Éxito al agregar el Lugar
        } else {
            return false; // Error al agregar el Lugar
        }
    }

    public function modificarLugar($ip, $lugar, $descripcion)
    {
        $ip = $this->escapar($ip);
        $lugar = $this->escapar($lugar);
        $descripcion = $this->escapar($descripcion);

        $query = "UPDATE lugar SET lugar = '$lugar', descripcion = '$descripcion' WHERE ip = '$ip'";

        if ($this->db->query($query)) {
            return true; // Éxito al modificar el Lugar
        } else {
            return false; // Error al modificar el Lugar
        }
    }

    public function borrarLugar($ip)
    {
        $ip = $this->escapar($ip);

        $query = "DELETE FROM lugar WHERE ip = '$ip'";

        if ($this->db->query($query)) {
            return true; // Éxito al borrar el Lugar
        } else {
            return false; // Error al borrar el Lugar
        }
    }

    private function escapar($valor)
    {
        // Implementa la lógica de escapado de datos aquí
        return $valor; // Este es un ejemplo, debes implementar el escapado seguro
    }
}
?>

