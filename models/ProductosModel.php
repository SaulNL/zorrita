<?php
// models/ProductosModel.php

class ProductosModel {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    // Obtener la lista de productos
    public function getAllProductos() {
        // Lógica para obtener todos los productos desde la base de datos
        $query = "SELECT * FROM productos";
        $result = $this->conexion->query($query);

        $productos = array(); // Inicializar un array para almacenar los resultados

        while ($row = $result->fetch_assoc()) {
            $productos[] = $row; // Agregar cada fila al array
        }

        return $productos;
    }

    // Obtener la lista de tipos de producto
    public function getTiposProducto() {
        // Lógica para obtener todos los tipos de producto desde la base de datos
        $query = "SELECT * FROM tipos_producto";
        $result = $this->conexion->query($query);

        $tiposProductos = array(); // Inicializar un array para almacenar los resultados

        while ($row = $result->fetch_assoc()) {
            $tiposProductos[] = $row; // Agregar cada fila al array
        }

        return $tiposProductos;
    }

    // Obtener información de un producto por ID
    public function getProductoById($id) {
        // Lógica para obtener información de un producto por ID desde la base de datos
        $query = "SELECT * FROM productos WHERE id = ?";
        $statement = $this->conexion->prepare($query);
        $statement->bind_param('i', $id);
        $statement->execute();

        $result = $statement->get_result();
        $producto = $result->fetch_assoc();

        $statement->close();

        return $producto;
    }

    // Agregar un nuevo producto
    public function agregarProducto($nombre, $cantidad, $tipo_producto_id) {
        // Lógica para agregar un nuevo producto a la base de datos
        $query = "INSERT INTO productos (nombre, cantidad, tipo_producto_id) VALUES (?, ?, ?)";
        $statement = $this->conexion->prepare($query);
        $statement->bind_param('sii', $nombre, $cantidad, $tipo_producto_id);
        $statement->execute();

        $statement->close();
    }

    // Actualizar información de un producto
    public function actualizarProducto($id, $nombre, $cantidad, $tipo_producto_id) {
        // Lógica para actualizar información de un producto en la base de datos
        $query = "UPDATE productos SET nombre = ?, cantidad = ?, tipo_producto_id = ? WHERE id = ?";
        $statement = $this->conexion->prepare($query);
        $statement->bind_param('siii', $nombre, $cantidad, $tipo_producto_id, $id);
        $statement->execute();

        $statement->close();
    }

    // Eliminar un producto por ID
    public function eliminarProducto($id) {
        // Lógica para eliminar un producto de la base de datos por ID
        $query = "DELETE FROM productos WHERE id = ?";
        $statement = $this->conexion->prepare($query);
        $statement->bind_param('i', $id);
        $statement->execute();

        $statement->close();
    }
}
?>
