<?php
// models/TiposProductoModel.php

class TiposProductoModel {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    // Obtener la lista de tipos de producto
    public function getAllTiposProducto() {
        // Lógica para obtener todos los tipos de producto desde la base de datos
        $query = "SELECT * FROM tipos_producto";
        $result = $this->conexion->query($query);

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener información de un tipo de producto por ID
    public function getTipoProductoById($id) {
        // Lógica para obtener información de un tipo de producto por ID desde la base de datos
        $query = "SELECT * FROM tipos_producto WHERE id = :id";
        $statement = $this->conexion->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    // Agregar un nuevo tipo de producto
    public function agregarTipoProducto($nombre) {
        // Lógica para agregar un nuevo tipo de producto a la base de datos
        $query = "INSERT INTO tipos_producto (nombre) VALUES (:nombre)";
        $statement = $this->conexion->prepare($query);
        $statement->bindParam(':nombre', $nombre);
        $statement->execute();
    }

    // Actualizar información de un tipo de producto
    public function actualizarTipoProducto($id, $nombre) {
        // Lógica para actualizar información de un tipo de producto en la base de datos
        $query = "UPDATE tipos_producto SET nombre = :nombre WHERE id = :id";
        $statement = $this->conexion->prepare($query);
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':id', $id);
        $statement->execute();
    }

    // Eliminar un tipo de producto por ID
    public function eliminarTipoProducto($id) {
        // Lógica para eliminar un tipo de producto de la base de datos por ID
        $query = "DELETE FROM tipos_producto WHERE id = :id";
        $statement = $this->conexion->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->execute();
    }
}
?>