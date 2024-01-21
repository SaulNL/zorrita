<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Agregar Nuevo Tipo de Producto</h2>

<form action="/tipos_producto/store" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required>

    <button type="submit">Guardar</button>
</form>
</body>
</html>