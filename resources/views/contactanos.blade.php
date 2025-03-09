@extends('layouts.app')

@section('content')

<title>FitWeb Contactanos</title>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb-text">
                    <h2>Contáctanos</h2>
                    <div class="bt-option">
                        <a href="/">Inicio</a>
                        <span>Contáctanos</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Contact Section Begin -->
<section class="contact-section spad">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="leave-comment">
                    <form id="contactForm">
                        <div class="form-group">
                            <input type="text" class="form-control mb-3" id="name" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control mb-3" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control mb-3" id="numero" placeholder="Número">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control mb-3" id="comment" placeholder="Comentario"></textarea>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="submitForm()">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

<script>
    function submitForm() {
        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var numero = document.getElementById('numero').value;
        var comment = document.getElementById('comment').value;

        var mailtoLink = 'mailto:contact@fitweb.com.co' +
            '?subject=Formulario de Contacto' +
            '&body=Nombre: ' + encodeURIComponent(name) +
            '%0D%0AEmail: ' + encodeURIComponent(email) +
            '%0D%0ANúmero: ' + encodeURIComponent(numero) +
            '%0D%0AComentario: ' + encodeURIComponent(comment);

        window.location.href = mailtoLink;
    }
</script>

@endsection