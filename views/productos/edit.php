<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Editar Producto</h2>

<form action="/productos/update" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="" required>

    <label for="cantidad">Cantidad:</label>
    <input type="number" name="cantidad" value="<!-- Mostrar valor actual desde el controlador -->" required>

    <label for="tipo_producto_id">Tipo de Producto:</label>
    <select name="tipo_producto_id" required>
        <!-- Mostrar opciones de tipos de productos desde el controlador -->
    </select>

    <button type="submit">Actualizar</button>
</form>
</body>
</html>