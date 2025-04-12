<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @if (class_basename($user) === 'Admin')
            Admin Dashboard
        @elseif (class_basename($user) === 'Receptionist')
            Receptionista Dashboard
        @else
            Dashboard
        @endif
    </title>
    @vite(['resources/css/tailwind.css'])
    <style>
        /* Transición suave para el menú móvil */
        #mobile-sidebar {
            transition: transform 0.3s ease-in-out;
        }

        #mobile-sidebar.closed {
            transform: translateX(-100%);
        }

        #mobile-sidebar.open {
            transform: translateX(0);
        }

        /* Overlay con transición */
        #mobile-overlay {
            transition: opacity 0.3s ease-in-out;
        }

        /* Animación del botón hamburguesa */
        .hamburger-line {
            transition: all 0.3s ease;
        }

        .hamburger-open .hamburger-line:nth-child(1) {
            transform: rotate(45deg) translate(5px, 5px);
        }

        .hamburger-open .hamburger-line:nth-child(2) {
            opacity: 0;
        }

        .hamburger-open .hamburger-line:nth-child(3) {
            transform: rotate(-45deg) translate(5px, -5px);
        }

        /* Animación del SVG hamburguesa */
        .hamburger-icon {
            width: 24px;
            height: 24px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .hamburger-icon line {
            stroke: white;
            stroke-width: 2;
            stroke-linecap: round;
            transform-origin: center;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .hamburger-open .hamburger-icon line:nth-child(1) {
            transform: translateY(6px) rotate(45deg);
        }

        .hamburger-open .hamburger-icon line:nth-child(2) {
            opacity: 0;
            transform: scaleX(0);
        }

        .hamburger-open .hamburger-icon line:nth-child(3) {
            transform: translateY(-6px) rotate(-45deg);
        }
    </style>

</head>

<body class="bg-gray-900 text-white">
    <!-- Contenedor con margen y posicionamiento fijo -->
    <div class="lg:hidden">
        <!-- Botón con márgenes internas y sombra -->
        <button id="mobile-menu-button"
            class="m-4 p-3 rounded-md bg-gray-700 hover:bg-gray-600 focus:outline-none shadow-md transition-all duration-300">
            <svg class="hamburger-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <line x1="3" y1="6" x2="21" y2="6" />
                <line x1="3" y1="12" x2="21" y2="12" />
                <line x1="3" y1="18" x2="21" y2="18" />
            </svg>
        </button>
    </div>

    <div class="flex min-h-screen">
        <!-- Sidebar para móvil -->
        <div id="mobile-sidebar" class="lg:hidden fixed inset-0 z-40 closed">
            <div id="mobile-overlay" class="fixed inset-0 bg-gray-900/80 backdrop-blur-sm opacity-0 invisible"></div>
            <div class="relative flex-1 flex flex-col w-72 max-w-xs bg-gray-800 h-full border-r border-gray-700">
                <div class="absolute top-0 right-0 -mr-12 pt-4">
                    <button id="close-mobile-menu" aria-label="Cerrar menú"
                        class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none bg-gray-700 hover:bg-gray-600 transition-all duration-300">
                        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="p-6 border-b border-gray-700">
                    <h1 class="text-2xl font-bold text-orange-400">Mi Panel</h1>
                </div>
                <nav class="mt-6 space-y-3 px-4 py-4">
                    <a href="dashboard"
                        class="nav-item block py-3 px-4 hover:bg-gray-700/50 rounded-lg text-gray-200 hover:text-white">
                        <span class="flex items-center">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Inicio
                        </span>
                    </a>
                    <a href="{{ route(class_basename($user) === 'Admin' ? 'admin.users' : 'receptionist.users') }}"
                        class="nav-item block py-3 px-4 hover:bg-gray-700/50 rounded-lg text-gray-200 hover:text-white">
                        <span class="flex items-center">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            Usuarios
                        </span>
                    </a>
                    <a href="#"
                        class="nav-item block py-3 px-4 hover:bg-gray-700/50 rounded-lg text-gray-200 hover:text-white">
                        <span class="flex items-center">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Configuración
                        </span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="mt-10 px-4">
                        @csrf
                        <button type="submit"
                            class="w-full nav-item flex items-center py-3 px-4 bg-orange-600 hover:bg-orange-700 rounded-lg transition-all duration-300 group">
                            <svg class="w-5 h-5 mr-3 transform group-hover:rotate-12 transition-transform"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Cerrar sesión
                        </button>
                    </form>
                </nav>
            </div>
        </div>

        <aside class="w-full md:w-64 bg-gray-800 text-gray-100 shadow-lg md:block hidden md:relative p-4 lg:p-8">
            <div class="p-6 border-b border-gray-700">
                <h1 class="text-2xl font-bold">Mi Panel</h1>
            </div>
            <nav class="mt-6 space-y-2">
                <a href="dashboard" class="block py-2.5 px-4 hover:bg-gray-700 rounded">Inicio</a>
                <a href="{{ route(class_basename(auth()->user()) === 'Admin' ? 'admin.users' : 'receptionist.users') }}"
                    class="block py-2.5 px-4 hover:bg-gray-700 rounded">
                    Usuarios</a>
                <a href="#" class="block py-2.5 px-4 hover:bg-gray-700 rounded">Configuración</a>
                <form method="POST" action="{{ route('logout') }}" class="mt-4 px-4">
                    @csrf
                    <button type="submit"
                        class="w-full text-left py-2.5 px-4 bg-orange-600 hover:bg-orange-700 rounded">Cerrar
                        sesión</button>
                </form>
            </nav>
        </aside>

        <!-- Contenido principal -->
        <main class="flex-1 p-4 lg:p-8 mt-1 lg:mt-0">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
                <h1 class="text-2xl lg:text-3xl font-bold">
                    Usuarios - {{ class_basename($user) === 'Admin' ? 'Admin' : 'Recepcionista' }}
                </h1>
                <a href="{{ route(class_basename(auth()->user()) === 'Admin' ? 'admin.users.create' : 'receptionist.users.create') }}"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow w-full md:w-auto text-center">
                    + Agregar Usuario
                </a>
            </div>

            <div class="overflow-x-auto">
                <div class="min-w-full inline-block align-middle">
                    <div class="overflow-hidden">
                        <table class="min-w-full bg-gray-800 rounded-lg shadow">
                            <thead>
                                <tr class="text-left border-b border-gray-700">
                                    <th class="px-2 py-2 lg:px-4 lg:py-3">ID</th>
                                    <th class="px-2 py-2 lg:px-4 lg:py-3">Nombre</th>
                                    <th class="px-2 py-2 lg:px-4 lg:py-3 hidden sm:table-cell">Género</th>
                                    <th class="px-2 py-2 lg:px-4 lg:py-3 hidden md:table-cell">Fecha Nac.</th>
                                    <th class="px-2 py-2 lg:px-4 lg:py-3 hidden sm:table-cell">Teléfono</th>
                                    <th class="px-2 py-2 lg:px-4 lg:py-3 hidden md:table-cell">Estado</th>
                                    <th class="px-2 py-2 lg:px-4 lg:py-3 hidden lg:table-cell">Gimnasio</th>
                                    <th class="px-2 py-2 lg:px-4 lg:py-3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $userRow)
                                    <tr class="border-b border-gray-700 hover:bg-gray-700 transition">
                                        <td class="px-2 py-2 lg:px-4 lg:py-3">{{ $userRow->id }}</td>
                                        <td class="px-2 py-2 lg:px-4 lg:py-3">{{ $userRow->name }}</td>
                                        <td class="px-2 py-2 lg:px-4 lg:py-3 hidden sm:table-cell">
                                            {{ $userRow->gender }}</td>
                                        <td class="px-2 py-2 lg:px-4 lg:py-3 hidden md:table-cell">
                                            {{ $userRow->birth_date }}</td>
                                        <td class="px-2 py-2 lg:px-4 lg:py-3 hidden sm:table-cell">
                                            {{ $userRow->phone_number }}</td>
                                        <td class="px-2 py-2 lg:px-4 lg:py-3 hidden md:table-cell">
                                            {{ $userRow->state }}</td>
                                        <td class="px-2 py-2 lg:px-4 lg:py-3 hidden lg:table-cell">
                                            {{ $userRow->gym->name }}</td>
                                        <td class="px-2 py-2 lg:px-4 lg:py-3 flex flex-wrap gap-1">
                                            <a href="{{ route('users.edit', $userRow->id) }}"
                                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 text-sm lg:px-3 lg:py-1 lg:text-base rounded">
                                                Editar
                                            </a>
                                            <form action="{{ route('users.destroy', $userRow->id) }}" method="POST"
                                                onsubmit="return confirm('¿Estás seguro de eliminar este usuario?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 text-sm lg:px-3 lg:py-1 lg:text-base rounded">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                @if ($users->isEmpty())
                                    <tr>
                                        <td colspan="8" class="text-center px-4 py-6 text-gray-400">
                                            No hay usuarios registrados.
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const closeMobileMenu = document.getElementById('close-mobile-menu');
        const mobileSidebar = document.getElementById('mobile-sidebar');
        const mobileOverlay = document.getElementById('mobile-overlay');

        function toggleMenu() {
            const isOpen = mobileSidebar.classList.toggle('open');
            mobileSidebar.classList.toggle('closed');

            // Animación del overlay
            mobileOverlay.style.opacity = isOpen ? '1' : '0';
            mobileOverlay.style.pointerEvents = isOpen ? 'auto' : 'none';

            // Animación del botón hamburguesa
            mobileMenuButton.classList.toggle('hamburger-open');
        }

        mobileMenuButton.addEventListener('click', toggleMenu);
        closeMobileMenu.addEventListener('click', toggleMenu);

        // Cerrar menú al hacer clic en el overlay
        mobileOverlay.addEventListener('click', toggleMenu);

        // Cerrar menú al hacer clic en un enlace (opcional)
        document.querySelectorAll('#mobile-sidebar nav a').forEach(link => {
            link.addEventListener('click', toggleMenu);
        });
    </script>
</body>

</html>
