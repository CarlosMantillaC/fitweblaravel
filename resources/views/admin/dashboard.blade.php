<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    @vite([
    
    'resources/css/tailwind.css'])
</head>

<body>
    <h1>Bienvenido al Dashboard</h1>
    <h1 class="text-3xl text-center text-red-600">
        Hello world!
    </h1>
    
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Cerrar sesión</button>
    </form>

</body>

</html>
