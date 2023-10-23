<?php
    class Jesuita
    {
        private $db; // Representa la conexión a la base de datos

        public function __construct($db)
        {
            $this->db = $db; // Constructor que recibe la conexión a la base de datos
        }

        // Método para agregar un nuevo Jesuita a la base de datos
        public function agregarJesuita($idJesuita, $nombre, $firma)
        {

            // Construye la consulta SQL para insertar un nuevo Jesuita
            $query = "INSERT INTO jesuita (idJesuita, nombre, firma) VALUES ($idJesuita, '$nombre', '$firma')";

            // Ejecuta la consulta SQL y verifica si se realizó con éxito
            if ($this->db->query($query)) {
                return true; // Éxito al agregar el Jesuita
            } else {
                return false; // Error al agregar el Jesuita
            }
        }

        // Método para modificar un Jesuita existente en la base de datos
        public function modificarJesuita($idJesuita, $nombre, $firma)
        {
            // Convierte $idJesuita a un entero para garantizar que sea un número
            $idJesuita = (int)$idJesuita;

            // Construye la consulta SQL para actualizar el nombre y la firma del Jesuita
            $query = "UPDATE jesuita SET nombre = '$nombre', firma = '$firma' WHERE idJesuita = $idJesuita";

            // Ejecuta la consulta SQL y verifica si se realizó con éxito
            if ($this->db->query($query)) {
                return true; // Éxito al modificar el Jesuita
            } else {
                return false; // Error al modificar el Jesuita
            }
        }

        // Método para borrar un Jesuita de la base de datos
        public function borrarJesuita($idJesuita)
        {
            // Convierte $idJesuita a un entero para garantizar que sea un número
            $idJesuita = (int)$idJesuita;

            // Construye la consulta SQL para eliminar un Jesuita
            $query = "DELETE FROM jesuita WHERE idJesuita = $idJesuita";

            // Ejecuta la consulta SQL y verifica si se realizó con éxito
            if ($this->db->query($query)) {
                return true; // Éxito al borrar el Jesuita
            } else {
                return false; // Error al borrar el Jesuita
            }
        }

    }
?>



