<?php
// index.php

require_once 'config.php';

// Manejo básico de rutas
$uri = $_SERVER['REQUEST_URI'];
$uri = explode('/', $uri);

// Definir controlador y acción predeterminados
$controller = 'ProductosController';
$action = 'index';

// Manejo de rutas para Tipos de Producto
if ($uri[1] == 'tipos_producto') {
    $controller = 'TiposProductoController';

    // Manejar acciones específicas, por ejemplo, create, edit, etc.
    $action = $uri[2] ?? 'index';

    // Agregar manejo para la acción edit
    if ($action == 'edit') {
        $controllerInstance = new $controller($conexion);
        $controllerInstance->edit();
        return;  // Terminar la ejecución después de procesar la acción
    }

    // Agregar manejo para la acción destroy
    if ($action == 'destroy') {
        $controllerInstance = new $controller($conexion);
        $controllerInstance->destroy();
        return;  // Terminar la ejecución después de procesar la acción
    }
}

// Manejo de rutas para Productos
if ($uri[1] == 'productos') {
    $controller = 'ProductosController';

    // Manejar acciones específicas, por ejemplo, create, edit, etc.
    $action = $uri[2] ?? 'index';

    // Agregar manejo para la acción store
    if ($action == 'store') {
        $controllerInstance = new $controller($conexion);
        $controllerInstance->store();
        return;  // Terminar la ejecución después de procesar la acción
    }
}

// Cargar el controlador correspondiente
require_once "controllers/$controller.php";

// Instanciar el controlador y pasar la conexión a la base de datos
$controllerInstance = new $controller($conexion);

// Llamar a la acción correspondiente
if (method_exists($controllerInstance, $action)) {
    $controllerInstance->$action();
} else {
    // Manejar caso de acción no encontrada
    echo "Error: Acción no encontrada.";
}


?>