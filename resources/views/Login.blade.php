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

    <!-- Css Styles -->


    @vite(['resources/css/app.css','resources/js/app.js'])

</head>
<main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
        <div class="card login-card">
        <img src="img/logotipo.png" alt="logo" class="logo">
            <div class="row no-gutters">
                
                <div class="col-md-5">
                    <img src="img/gallery/gallery-4.jpg" alt="login" class="login-card-img">
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <p class="login-card-description"> ._   Inicia sesión en tu cuenta _.</p>
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

                            <!-- Botón para regresar al index -->
                            <a href="index.html" class="btn btn-black btn-block">Regresar al Inicio</a>
                        </form>
                        <br>
                        <p class="login-card-footer-text">¿No estás registrado? <br> Comunícate con la recepción del gimnasio.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('footer')