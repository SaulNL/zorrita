<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h2>Editar Tipo de Producto</h2>

<form action="/tipos_producto/update" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="<!-- Mostrar valor actual desde el controlador -->" required>

    <button type="submit">Actualizar</button>
</form>
    
</body>
</html>