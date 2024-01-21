<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- views/productos/index.php -->
<h2>Listado de Productos</h2>
<!-- Enlace para agregar un nuevo producto -->
<a href="/examen/views/productos/create.php">Agregar Nuevo Producto</a>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Tipo de Producto</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($productos as $producto): ?>
            <tr>
                <td><?php echo $producto['id']; ?></td>
                <td><?php echo $producto['nombre']; ?></td>
                <td><?php echo $producto['cantidad']; ?></td>
                <td><?php echo $producto['tipo_producto_id']; ?></td> <!-- Ajusta esto según tu estructura de base de datos -->
                <td>
                    <!-- Enlace para editar el producto -->
                    <a href="/examen/views/productos/edit.php?id=<?php echo $producto['id']; ?>">Editar</a>

                    <!-- Enlace para eliminar el producto (usar un formulario si es necesario) -->
                    <a href="/productos/destroy?id=<?php echo $producto['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
    

</body>
</html>