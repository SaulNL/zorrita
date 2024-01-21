<?php
// controllers/TiposProductoController.php

require_once 'models/TiposProductoModel.php';

class TiposProductoController {
    private $model;

    public function __construct($conexion) {
        $this->model = new TiposProductoModel($conexion);
    }

    public function index() {
        // Lógica para mostrar la lista de tipos de producto
        $tiposProductos = $this->model->getAllTiposProducto();
        include 'views/tipos_producto/index.php';
    }

    public function create() {
        // Lógica para mostrar el formulario de creación
        include 'views/tipos_producto/create.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];

            // Validar los datos según sea necesario

            // Lógica para almacenar en la base de datos
            $this->model->agregarTipoProducto($nombre);

            // Redirigir a la lista de tipos de producto después de almacenar
            header('Location: /tipos_producto');
        }
    }

    public function edit() {
         // Obtener el ID del tipo de producto a editar desde la URL
         $id = $_GET['id'] ?? null;

         // Obtener la información del tipo de producto desde el modelo
         $tipoProducto = $this->model->getTipoProductoById($id);
 
         // Mostrar el formulario de edición
         include 'views/tipos_producto/edit.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];

            // Validar los datos según sea necesario

            // Lógica para actualizar en la base de datos
            $this->model->actualizarTipoProducto($id, $nombre);

            // Redirigir a la lista de tipos de producto después de actualizar
            header('Location: /tipos_producto');
        }
    }

    public function destroy() {
        // Lógica para eliminar un tipo de producto de la base de datos
        {
            // Obtener el ID del tipo de producto a eliminar desde la URL
            $id = $_GET['id'] ?? null;
    
            // Lógica para eliminar el tipo de producto de la base de datos
            $this->model->eliminarTipoProducto($id);
    
            // Redirigir a la lista de tipos de producto después de eliminar
            header('Location: /tipos_producto');
        }
    }
}
?>