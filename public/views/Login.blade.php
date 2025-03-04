<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Corpusfit - Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="img/gallery/gallery-4.jpg" alt="login" class="login-card-img">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <img src="img/logo.png" alt="logo" class="logo">
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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
