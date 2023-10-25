<?php
class Visita
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function agregarVisita($idJesuita, $ip, $fechaHora)
    {
        $idJesuita = $this->escapar($idJesuita);
        $ip = $this->escapar($ip);
        $fechaHora = $this->escapar($fechaHora);
    
        $query = "INSERT INTO visita (idJesuita, ip, fechaHora) VALUES ($idJesuita, '$ip', NOW())";
    
        if ($this->db->query($query)) {
            return true; // Éxito al agregar la Visita
        } else {
            return false; // Error al agregar la Visita
        }
    }

    public function borrarVisita($idVisita)
    {
        $idVisita = (int)$idVisita;

        $query = "DELETE FROM visita WHERE idVisita = $idVisita";

        if ($this->db->query($query)) {
            return true; // Éxito al borrar la Visita
        } else {
            return false; // Error al borrar la Visita
        }
    }

    private function escapar($valor)
    {
        // Implementa la lógica de escapado de datos aquí
        return $valor; // Este es un ejemplo, debes implementar el escapado seguro
    }
}
?>


