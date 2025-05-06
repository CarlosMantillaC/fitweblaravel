<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Tipografía Oswald -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Oswald', sans-serif;
        }
    </style>
</head>

<body class="font-bold bg-primary text-white">

    <!-- Botón menú móvil -->
    <div class="lg:hidden">
        <button id="mobile-menu-button"
            class="m-4 p-3 rounded-md bg-[#151515] focus:outline-none shadow-md hover:bg-[#1f1f1f] transition-all"
            aria-expanded="false" aria-controls="mobile-sidebar">
            <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <line x1="3" y1="6" x2="21" y2="6" stroke-width="2" stroke="currentColor" />
                <line x1="3" y1="12" x2="21" y2="12" stroke-width="2" stroke="currentColor" />
                <line x1="3" y1="18" x2="21" y2="18" stroke-width="2" stroke="currentColor" />
            </svg>
        </button>
    </div>

    <div class="flex min-h-screen">
        <!-- Sidebar móvil -->
        <div id="mobile-sidebar" class="lg:hidden fixed inset-0 z-40 closed">
            <div id="mobile-overlay" class="fixed inset-0 bg-black/70 backdrop-blur-sm opacity-0 invisible"></div>
            <div class="relative flex flex-col w-72 max-w-xs bg-[#1a1a1a] h-full border-r border-gray-700">
                <div class="absolute top-0 right-0 -mr-12 pt-4">
                    <button id="close-mobile-menu" aria-label="Cerrar menú"
                        class="flex items-center justify-center h-10 w-10 rounded-full bg-gray-800 hover:bg-gray-700 transition">
                        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <nav class="mt-6 px-4 py-4 space-y-3">
                    @php $isAdmin = class_basename($user) === 'Admin'; @endphp

                    <a href="{{ route($isAdmin ? 'admin.dashboard' : 'receptionist.dashboard') }}"
                        class="nav-item block py-3 px-4 rounded-lg hover:bg-gray-700/50 text-gray-200 hover:text-white transition">
                        <i class="fa-solid fa-house text-tertiary mr-3"></i> Inicio
                    </a>

                    <a href="{{ route($isAdmin ? 'admin.users' : 'receptionist.users') }}"
                        class="nav-item block py-3 px-4 rounded-lg hover:bg-gray-700/50 text-gray-200 hover:text-white transition">
                        <i class="fa-solid fa-users text-tertiary mr-3"></i> Usuarios
                    </a>

                    <a href="{{ route($isAdmin ? 'admin.memberships' : 'receptionist.memberships') }}"
                        class="nav-item block py-3 px-4 rounded-lg hover:bg-gray-700/50 text-gray-200 hover:text-white transition">
                        <i class="fa-solid fa-id-card text-tertiary mr-3"></i> Membresías
                    </a>

                    <a href="{{ route($isAdmin ? 'admin.payments' : 'receptionist.payments') }}"
                        class="flex items-center gap-3 py-2.5 px-4 hover:bg-gray-700 rounded text-gray-200 hover:text-white transition-all duration-300">
                        <i class="fas fa-money-bill-wave text-[#f36100]"></i>
                        <span>Pagos</span>
                    </a>

                    <a href="#"
                        class="nav-item block py-3 px-4 rounded-lg hover:bg-gray-700/50 text-gray-200 hover:text-white transition">
                        <i class="fa-solid fa-gear text-tertiary mr-3"></i> Configuración
                    </a>

                    <form method="POST" action="{{ route('logout') }}" class="mt-8 px-4">
                        @csrf
                        <button type="submit"
                            class="w-full flex items-center justify-center py-3 px-4 bg-tertiary hover:bg-orange-600 rounded-lg transition">
                            <i class="fa-solid fa-right-from-bracket mr-2"></i> Cerrar sesión
                        </button>
                    </form>
                </nav>
            </div>
        </div>

        <!-- Sidebar escritorio -->
        <aside class="hidden lg:block w-full md:w-70 bg-secondary text-white shadow-lg p-4 md:p-8">
            <div class="p-6 border-b border-gray-700">
                <h1 class="text-2xl font-bold">Mi Panel</h1>
            </div>
            <nav class="mt-6 space-y-2">
                <a href="{{ route($isAdmin ? 'admin.dashboard' : 'receptionist.dashboard') }}"
                    class="flex items-center gap-3 py-2.5 px-4 hover:bg-[#252525] hover:text-white transition duration-300">
                    <i class="fas fa-home text-[#f36100]"></i> <span>Inicio</span>
                </a>

                <a href="{{ route($isAdmin ? 'admin.users' : 'receptionist.users') }}"
                    class="flex items-center gap-3 py-2.5 px-4 hover:bg-gray-700 rounded text-gray-200 hover:text-white transition-all duration-300">
                    <i class="fas fa-users text-[#f36100]"></i>
                    <span>Usuarios</span>
                </a>

                <a href="{{ route($isAdmin ? 'admin.memberships' : 'receptionist.memberships') }}"
                    class="flex items-center gap-3 py-2.5 px-4 hover:bg-gray-700 rounded text-gray-200 hover:text-white transition-all duration-300">
                    <i class="fas fa-id-card text-[#f36100]"></i>
                    <span>Membresías</span>
                </a>

                <a href="{{ route($isAdmin ? 'admin.payments' : 'receptionist.payments') }}"
                    class="flex items-center gap-3 py-2.5 px-4 hover:bg-gray-700 rounded text-gray-200 hover:text-white transition-all duration-300">
                    <i class="fas fa-money-bill-wave text-[#f36100]"></i>
                    <span>Pagos</span>
                </a>

                <a href="#"
                    class="flex items-center gap-3 py-2.5 px-4 hover:bg-[#252525] hover:text-white transition duration-300">
                    <i class="fas fa-cog text-[#f36100]"></i> <span>Configuración</span>
                </a>

                <form method="POST" action="{{ route('logout') }}" class="mt-6 px-4">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center justify-center gap-2 py-2.5 px-4 bg-[#f36100] hover:bg-orange-600 rounded text-white transition">
                        <i class="fas fa-sign-out-alt"></i> <span>Cerrar sesión</span>
                    </button>
                </form>
            </nav>
        </aside>

        <!-- Contenido principal -->
        <main class="flex-1">
            @yield('content')
        </main>
    </div>

</body>

</html>
