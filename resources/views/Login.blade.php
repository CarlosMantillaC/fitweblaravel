<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="description" content="Gym Template">
    <meta name="keywords" content="Gym, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    @vite([
    'resources/assets/css/bootstrap.min.css',
    'resources/assets/css/font-awesome.min.css',
    'resources/assets/css/flaticon.css',
    'resources/assets/css/owl.carousel.min.css',
    'resources/assets/css/barfiller.css',
    'resources/assets/css/magnific-popup.css',
    'resources/assets/css/slicknav.min.css',
    'resources/assets/css/style.css',
    'resources/assets/css/materialdesignicons.min.css',
    'resources/assets/js/jquery-3.4.1.min.js',
    'resources/assets/js/bootstrap.min.js',
    'resources/assets/js/jquery.magnific-popup.min.js',
    'resources/assets/js/masonry.pkgd.min.js',
    'resources/assets/js/jquery.barfiller.js',
    'resources/assets/js/jquery.slicknav.js',
    'resources/assets/js/owl.carousel.min.js',
    'resources/css/app.css',
    'resources/js/app.js',
    'resources/assets/js/main.js'])

</head>

<section class="login-section d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
        <div class="card login-card">
            <div class="row no-gutters">
                <div class="col-md-5">
                    <img src="img/hero/hero8c.png" alt="login" class="login-card-img">
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <!-- Logo centrado encima del título -->
                        <div class="logo text-center col-6 col-lg-4">
                            <img src="img/logotipo.png" alt="logo" class="login-logo">
                        </div>
                        <p class="login-card-description">Inicia sesión en tu cuenta</p>
                        <form action="LoginServlet" method="post">
                            <div class="form-group">
                                <label for="username" class="sr-only">Usuario</label>
                                <input type="email" name="username" id="username" class="form-control" placeholder="Correo electrónico">
                            </div>
                            <div class="form-group mb-4">
                                <label for="password" class="sr-only">Contraseña</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña">
                            </div>
                            <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Iniciar sesión">
                            <!-- Botón para regresar al inicio /-->
                            <a href="/" class="btn btn-black btn-block">Regresar al Inicio</a>
                        </form>
                        <br>
                        <p class="login-card-footer-text">¿No estás registrado? <br> Comunícate con la recepción del gimnasio.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('footer')