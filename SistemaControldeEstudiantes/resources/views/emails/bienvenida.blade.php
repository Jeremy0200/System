<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido al sistema</title>
</head>
<body>
    <h1>Bienvenido, {{ $usuarioNombre }}</h1>
    <p>Hemos creado tu cuenta en el sistema como <strong>{{ $usuarioRol }}</strong>.</p>
    <p>¡Gracias por unirte!</p>
</body>
</html>