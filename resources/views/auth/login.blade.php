<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="description" content="Gym Template">
    <meta name="keywords" content="Gym, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <title>FitWeb Login</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet">


    @vite(['resources/css/app.css', 'resources/js/app.js'])



</head>
<section class="login-section flex items-center min-h-screen py-6 bg-gray-100">
    <div class="container mx-auto px-4">
        <div class="bg-white rounded-lg shadow-lg max-w-4xl mx-auto md:my-12">
            <div class="flex flex-col md:flex-row">
                <!-- Imagen -->
                <div class="w-full md:w-5/12">
                    <img src="img/hero/hero8c.png" alt="login" class="w-full h-full object-cover rounded-t-lg md:rounded-l-lg md:rounded-tr-none">
                </div>

                <!-- Formulario de login -->
                <div class="w-full md:w-7/12 p-8">
                    <div class="text-center mb-6">
                        <!-- Logo centrado encima del título -->
                        <div class="mx-auto w-1/2 lg:w-1/3">
                            <img src="img/logotipo.png" alt="logo" class="w-full mb-6">
                        </div>
                    </div>

                    <!-- Mostrar errores -->
                    @if (session('message'))
                        <div class="alert alert-danger mt-3 bg-red-500 text-white p-4 rounded-lg mb-4">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ url('/login') }}">
                        @csrf
                        <p class="text-xl text-gray-700 mt-3 mb-6">Inicia sesión en tu cuenta</p>
                        
                        <div class="mb-4">
                            <label for="email" class="sr-only">Correo</label>
                            <input type="email" name="email" id="email" class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Correo electrónico" required>
                        </div>

                        <div class="mb-6">
                            <label for="password" class="sr-only">Contraseña</label>
                            <input type="password" name="password" id="password" class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Contraseña" required>
                        </div>

                        <input name="login" id="login" class="w-full py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none mb-4" type="submit" value="Iniciar sesión">

                        <!-- Botón para regresar al inicio (como un botón de enlace) -->
                        <a href="/" class="block w-full py-3 bg-blue-600 text-white text-center rounded-lg hover:bg-blue-700 focus:outline-none">
                            Regresar al Inicio
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@include('footer')
