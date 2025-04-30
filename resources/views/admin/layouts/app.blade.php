<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap" rel="stylesheet">


</head>

<body class="font-['Oswald'] font-bold bg-primary text-white">
    <!-- Contenedor con margen y posicionamiento fijo -->
    <div class="md:hidden">
        <!-- Botón con márgenes internas y sombra -->
        <button id="mobile-menu-button"
            class="m-4 p-3 rounded-md bg-[#151515] focus:outline-none shadow-md transition-all duration-300">
            <svg class="hamburger-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <line x1="3" y1="6" x2="21" y2="6" />
                <line x1="3" y1="12" x2="21" y2="12" />
                <line x1="3" y1="18" x2="21" y2="18" />
            </svg>
        </button>
    </div>

    <div class="flex min-h-screen">
        <!-- Sidebar para móvil -->
        <div id="mobile-sidebar" class="md:hidden fixed inset-0 z-40 closed">
            <div id="mobile-overlay" class="fixed inset-0 bg-gray-900/80 backdrop-blur-sm opacity-0 invisible"></div>
            <div class="relative flex-1 flex flex-col w-72 max-w-xs bg-primary h-full border-r border-primary">
                <div class="absolute top-0 right-0 -mr-12 pt-4">
                    <button id="close-mobile-menu" aria-label="Cerrar menú"
                        class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none bg-primary hover:bg-gray-700 transition-all duration-300">
                        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <nav class="mt-6 space-y-3 px-4 py-4">
                    <a href="{{ route(class_basename($user) === 'Admin' ? 'admin.dashboard' : 'receptionist.dashboard') }}"
                        class="nav-item block py-3 px-4 hover:bg-gray-700/50 rounded-lg text-gray-200 hover:text-white">
                        <span class="flex items-center">
                            <i class="text-tertiary fa-solid fa-house mr-3"></i>
                            Inicio
                        </span>
                    </a>

                    <a href="{{ route(class_basename($user) === 'Admin' ? 'admin.users' : 'receptionist.users') }}"
                        class="nav-item block py-3 px-4 hover:bg-gray-700/50 rounded-lg text-gray-200 hover:text-white">
                        <span class="flex items-center">
                            <i class="text-tertiary fa-solid fa-users mr-3"></i>
                            Usuarios
                        </span>
                    </a>

                    <a href="{{ route(class_basename($user) === 'Admin' ? 'admin.users' : 'receptionist.users') }}"
                        class="nav-item block py-3 px-4 hover:bg-gray-700/50 rounded-lg text-gray-200 hover:text-white">
                        <span class="flex items-center">
                            <i class="text-tertiary fa-solid fa-id-card mr-3"></i>
                            Membresías
                        </span>
                    </a>

                    <a href="#"
                        class="nav-item block py-3 px-4 hover:bg-gray-700/50 rounded-lg text-gray-200 hover:text-white">
                        <span class="flex items-center">
                            <i class="text-tertiary fa-solid fa-gear mr-3"></i>
                            Configuración
                        </span>
                    </a>

                    <form method="POST" action="{{ route('logout') }}" class="mt-8 px-4">
                        @csrf
                        <button type="submit"
                            class="w-full nav-item flex justify-center items-center py-3 px-4 bg-tertiary rounded-lg transition-all duration-300 group">
                            <i
                                class="fa-solid fa-right-from-bracket mr-3 group-hover:rotate-12 transition-transform"></i>
                            Cerrar sesión
                        </button>
                    </form>
                </nav>

            </div>
        </div>


        <!-- Sidebar (oculto en móvil) -->
        <aside class="w-full md:w-70 bg-secondary text-white shadow-lg md:block hidden md:relative p-4 md:p-8">
            <div class="p-6 border-b border-gray-700">
                <h1 class="text-2xl font-bold">Mi Panel</h1>
            </div>
            <nav class="mt-6 space-y-2">
                <a href="{{ route(class_basename($user) === 'Admin' ? 'admin.dashboard' : 'receptionist.dashboard') }}"
                    class="flex items-center gap-3 py-2.5 px-4 hover:bg-gray-700 rounded text-gray-200 hover:text-white transition-all duration-300">
                    <i class="fas fa-home text-[#f36100]"></i>
                    <span>Inicio</span>
                </a>
            
                <a href="{{ route(class_basename($user) === 'Admin' ? 'admin.users' : 'receptionist.users') }}"
                    class="flex items-center gap-3 py-2.5 px-4 hover:bg-gray-700 rounded text-gray-200 hover:text-white transition-all duration-300">
                    <i class="fas fa-users text-[#f36100]"></i>
                    <span>Usuarios</span>
                </a>
            
                <a href="{{ route(class_basename($user) === 'Admin' ? 'admin.memberships' : 'receptionist.memberships') }}"
                    class="flex items-center gap-3 py-2.5 px-4 hover:bg-gray-700 rounded text-gray-200 hover:text-white transition-all duration-300">
                    <i class="fas fa-id-card text-[#f36100]"></i>
                    <span>Membresías</span>
                </a>
            
                <a href="#"
                    class="flex items-center gap-3 py-2.5 px-4 hover:bg-gray-700 rounded text-gray-200 hover:text-white transition-all duration-300">
                    <i class="fas fa-cog text-[#f36100]"></i>
                    <span>Configuración</span>
                </a>
            
                <form method="POST" action="{{ route('logout') }}" class="mt-4 px-4">
                    @csrf
                    <button type="submit"
                        class="mt-6 w-full flex items-center justify-center gap-2 py-2.5 px-4 bg-[#f36100] hover:bg-orange-600 text-white rounded transition-all duration-300">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Cerrar sesión</span>
                    </button>
                </form>
            </nav>
            
        </aside>


        @yield('content')
</body>

</html>
