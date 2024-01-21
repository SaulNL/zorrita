<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Agregar Nuevo Producto</h2>

<form action="/views/productos/store" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required>

    <label for="cantidad">Cantidad:</label>
    <input type="number" name="cantidad" required>

    <label for="tipo_producto_id">Tipo de Producto:</label>
    <select name="tipo_producto_id" id="tipo_producto_id" >
        <!-- Mostrar opciones de tipos de productos desde el controlador -->
    </select>

    <button type="submit">Guardar</button>
</form>
</body>
</html>