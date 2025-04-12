<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receptionist Dashboard</title>
    @vite(['resources/css/tailwind.css'])
</head>

<body class="bg-gray-900 text-white min-h-screen flex flex-col md:flex-row">
    <!-- Botón menú en móvil -->
    <div class="md:hidden p-4 bg-gray-800 flex justify-between items-center">
        <button onclick="document.querySelector('aside').classList.toggle('hidden')"
            class="text-white focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Sidebar (oculto en móvil) -->
    <aside class="w-full md:w-64 bg-gray-800 text-gray-100 shadow-lg md:block hidden md:relative p-4 lg:p-8">
        <div class="p-6 border-b border-gray-700">
            <h1 class="text-2xl font-bold">Mi Panel</h1>
        </div>
        <nav class="mt-6 space-y-2">
            <a href="dashboard" class="block py-2.5 px-4 hover:bg-gray-700 rounded">Inicio</a>
            <a href="{{ route('receptionist.users') }}" class="block py-2.5 px-4 hover:bg-gray-700 rounded">Usuarios</a>
            <a href="#" class="block py-2.5 px-4 hover:bg-gray-700 rounded">Configuración</a>
            <form method="POST" action="{{ route('logout') }}" class="mt-4 px-4">
                @csrf
                <button type="submit"
                    class="w-full text-left py-2.5 px-4 bg-orange-600 hover:bg-orange-700 rounded">Cerrar
                    sesión</button>
            </form>
        </nav>
    </aside>



    <!-- Main content -->
    <main class="flex-1 p-6 bg-gray-900">
        <h2 class="text-2xl md:text-3xl font-semibold mb-6 text-center md:text-left">Bienvenido al Dashboard</h2>

        <!-- Cards responsive -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
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
