<?php
// controllers/ProductosController.php

require_once 'models/ProductosModel.php';

class ProductosController {
    private $model;

    public function __construct($conexion) {
        $this->model = new ProductosModel($conexion);
    }

    public function index() {

        // Obtener la lista de productos desde el modelo
        $productos = $this->model->getAllProductos();

        // Obtener la lista de tipos de producto (necesaria para el formulario de creación)
        $tiposProductos = $this->model->getTiposProducto();

        include 'views/productos/index.php';
    }

    public function create() {
        // Obtener la lista de tipos de producto (necesaria para el formulario de creación)
        $tiposProductos = $this->model->getTiposProducto();

        // Mostrar el formulario de creación
        include 'views/productos/create.php';
    }

    public function store() {
        // Procesar el formulario de creación y almacenar en la base de datos
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $cantidad = $_POST['cantidad'];
            $tipo_producto_id = $_POST['tipo_producto_id'];

            // Validar los datos según sea necesario

            // Lógica para almacenar en la base de datos
            $this->model->agregarProducto($nombre, $cantidad, $tipo_producto_id);

            // Redirigir a la lista de productos después de almacenar
            header('Location: /productos');
            exit;
        }
    }

    public function edit() {
        // Obtener el ID del producto a editar desde la URL
        $id = $_GET['id'] ?? null;

        // Obtener la información del producto y la lista de tipos de producto desde el modelo
        $producto = $this->model->getProductoById($id);
        $tiposProductos = $this->model->getTiposProducto();

        // Mostrar el formulario de edición
        include 'views/productos/edit.php';
    }

    public function update() {
         // Procesar el formulario de edición y actualizar en la base de datos
         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $cantidad = $_POST['cantidad'];
            $tipo_producto_id = $_POST['tipo_producto_id'];

            // Validar los datos según sea necesario

            // Lógica para actualizar en la base de datos
            $this->model->actualizarProducto($id, $nombre, $cantidad, $tipo_producto_id);

            // Redirigir a la lista de productos después de actualizar
            header('Location: /productos');
        }
    }

    public function destroy() {
        // Obtener el ID del producto a eliminar desde la URL
        $id = $_GET['id'] ?? null;

        // Lógica para eliminar el producto de la base de datos
        $this->model->eliminarProducto($id);

        // Redirigir a la lista de productos después de eliminar
        header('Location: /productos');
    }
}
?>