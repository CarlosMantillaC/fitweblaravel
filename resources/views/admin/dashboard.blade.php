<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    @vite(['resources/css/tailwind.css'])
</head>

<body class="bg-gray-900 text-white min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-800 text-gray-100 shadow-lg">
        <div class="p-6 border-b border-gray-700">
            <h1 class="text-2xl font-bold">Mi Panel</h1>
        </div>
        <nav class="mt-6 space-y-2">
            <a href="#" class="block py-2.5 px-4 hover:bg-gray-700 rounded">Inicio</a>
            <a href="{{ route('admin.users') }}" class="block py-2.5 px-4 hover:bg-gray-700 rounded">Usuarios</a>
            <a href="#" class="block py-2.5 px-4 hover:bg-gray-700 rounded">Configuración</a>
            <form method="POST" action="{{ route('logout') }}" class="mt-4 px-4">
                @csrf
                <button type="submit" class="w-full text-left py-2.5 px-4 bg-orange-600 hover:bg-orange-700 rounded">Cerrar
                    sesión</button>
            </form>
        </nav>
    </aside>

    <!-- Main content -->
    <main class="flex-1 p-6 bg-gray-900">
        <h2 class="text-3xl font-semibold mb-6">Bienvenido al Dashboard</h2>

        <!-- Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-gray-800 p-5 rounded-lg shadow">
                <h3 class="text-lg font-medium">Estadística 1</h3>
                <p class="mt-2 text-gray-400">Contenido de la estadística.</p>
            </div>
            <div class="bg-gray-800 p-5 rounded-lg shadow">
                <h3 class="text-lg font-medium">Estadística 2</h3>
                <p class="mt-2 text-gray-400">Contenido de la estadística.</p>
            </div>
            <div class="bg-gray-800 p-5 rounded-lg shadow">
                <h3 class="text-lg font-medium">Estadística 3</h3>
                <p class="mt-2 text-gray-400">Contenido de la estadística.</p>
            </div>
        </div>
    </main>

</body>

</html>
