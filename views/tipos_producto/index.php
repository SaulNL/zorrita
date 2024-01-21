<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- views/tipos_producto/index.php -->

<h2>Listado de Tipos de Producto</h2>
<!-- Enlace para agregar un nuevo tipo de producto -->
<a href="/tipos_producto/create">Agregar Nuevo Tipo de Producto</a>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tiposProductos as $tipoProducto): ?>
            <tr>
                <td><?php echo $tipoProducto['id']; ?></td>
                <td><?php echo $tipoProducto['nombre']; ?></td>
                <td>
                    <!-- Enlace para editar el tipo de producto -->
                    <a href="/tipos_producto/edit?id=<?php echo $tipoProducto['id']; ?>">Editar</a>

                    <!-- Enlace para eliminar el tipo de producto (usar un formulario si es necesario) -->
                    <a href="/tipos_producto/destroy?id=<?php echo $tipoProducto['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este tipo de producto?')">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
    
</body>
</html>