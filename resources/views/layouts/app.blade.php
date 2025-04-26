<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="description" content="fitweb live">
    <meta name="keywords" content="Gym, fitweb live colombia, fitweb, live, colombia">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->


    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .offcanvas-menu {
            transform: translateX(100%);
            transition: transform 0.3s ease;
        }

        .offcanvas-menu.open {
            transform: translateX(0);
        }

        .overlay {
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .overlay.active {
            opacity: 1;
            visibility: visible;
        }
    </style>

</head>

<body class="font-sans antialiased">

    <!-- Overlay -->
    <div id="overlay" class="overlay fixed inset-0 bg-black bg-opacity-50 z-40"></div>

    <!-- Offcanvas Menu -->
    <div id="offcanvas-menu" class="offcanvas-menu fixed top-0 right-0 w-80 h-full bg-white z-50 shadow-xl p-6">
        <div class="flex justify-end">
            <button id="close-menu" class="text-2xl text-gray-700 hover:text-orange-500 focus:outline-none">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <nav class="mt-8">
            <ul class="space-y-4">
                <li><a href="/"
                        class="block py-2 px-4 text-gray-800 hover:text-orange-500 hover:bg-gray-100 rounded transition">Inicio</a>
                </li>
                <li><a href="funcionalidades"
                        class="block py-2 px-4 text-gray-800 hover:text-orange-500 hover:bg-gray-100 rounded transition">Funcionalidades</a>
                </li>
                <li><a href="contactanos"
                        class="block py-2 px-4 text-gray-800 hover:text-orange-500 hover:bg-gray-100 rounded transition">Contáctanos</a>
                </li>
                <li><a href="sobre-nosotros"
                        class="block py-2 px-4 text-gray-800 hover:text-orange-500 hover:bg-gray-100 rounded transition">Sobre
                        nosotros</a></li>
                <li><a href="login"
                        class="block py-2 px-4 font-medium text-orange-500 hover:bg-orange-50 rounded transition">Soy
                        FitWeb</a></li>
            </ul>
        </nav>
    </div>

    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-30">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between h-16 md:h-20">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="/" class="flex items-center">
                        <img src="img/logo.png" alt="FitWeb Logo" class="h-10">
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden md:block">
                    <ul class="flex space-x-8">
                        <li><a href="/" class="text-gray-800 hover:text-orange-500 transition">Inicio</a></li>
                        <li><a href="funcionalidades"
                                class="text-gray-800 hover:text-orange-500 transition">Funcionalidades</a></li>
                        <li><a href="sobre-nosotros" class="text-gray-800 hover:text-orange-500 transition">Sobre
                                nosotros</a></li>
                        <li><a href="contactanos" class="text-gray-800 hover:text-orange-500 transition">Contáctanos</a>
                        </li>
                        <li><a href="login"
                                class="ml-6 px-4 py-2 bg-orange-500 text-white rounded hover:bg-orange-600 transition">Soy
                                FitWeb</a></li>
                    </ul>
                </nav>

                <!-- Mobile Menu Button -->
                <button id="open-menu" class="md:hidden text-gray-700 hover:text-orange-500 text-xl focus:outline-none">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('footer')

    <!-- Script para abrir/cerrar menú -->
    <script>
        const openMenuButton = document.getElementById('open-menu');
        const closeMenuButton = document.getElementById('close-menu');
        const offcanvasMenu = document.getElementById('offcanvas-menu');
        const overlay = document.getElementById('overlay');

        function toggleMenu() {
            offcanvasMenu.classList.toggle('open');
            overlay.classList.toggle('active');
        }

        openMenuButton.addEventListener('click', toggleMenu);
        closeMenuButton.addEventListener('click', toggleMenu);
        overlay.addEventListener('click', toggleMenu);

        // Opcional: cerrar menú al hacer click en cualquier enlace del offcanvas
        document.querySelectorAll('#offcanvas-menu a').forEach(link => {
            link.addEventListener('click', toggleMenu);
        });
    </script>

</body>

</html>
