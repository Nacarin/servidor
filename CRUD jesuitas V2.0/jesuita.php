<?php
class Jesuita
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function agregarJesuita($idJesuita, $nombre, $firma)
    {
        $idJesuita = $this->escapar($idJesuita); // Corregir mayúsculas/minúsculas
        $nombre = $this->escapar($nombre);
        $firma = $this->escapar($firma);
    
        $query = "INSERT INTO jesuita (idJesuita, nombre, firma) VALUES ($idJesuita, '$nombre', '$firma')";
    
        if ($this->db->query($query)) {
            return true; // Éxito al agregar el Jesuita
        } else {
            return false; // Error al agregar el Jesuita
        }
    }
    

    public function modificarJesuita($idJesuita, $nombre, $firma)
    {
        $idJesuita = (int)$idJesuita;
        $nombre = $this->escapar($nombre);
        $firma = $this->escapar($firma);

        $query = "UPDATE jesuita SET nombre = '$nombre', firma = '$firma' WHERE idJesuita = $idJesuita";

        if ($this->db->query($query)) {
            return true; // Éxito al modificar el Jesuita
        } else {
            return false; // Error al modificar el Jesuita
        }
    }

    public function borrarJesuita($idJesuita)
    {
        $idJesuita = (int)$idJesuita;

        $query = "DELETE FROM jesuita WHERE idJesuita = $idJesuita";

        if ($this->db->query($query)) {
            return true; // Éxito al borrar el Jesuita
        } else {
            return false; // Error al borrar el Jesuita
        }
    }

    private function escapar($valor)
    {
        // Implementa la lógica de escapado de datos aquí
        return $valor; // Este es un ejemplo, debes implementar el escapado seguro
    }
}
?>


