@extends('layouts.app')

@section('content')

<title>FitWeb Contactanos</title>

<!-- Breadcrumb Section Begin -->
<section class="bg-cover bg-center text-white py-16" style="background-image: url('img/breadcrumb-bg.jpg');">
    <div class="container mx-auto text-center">
        <div class="breadcrumb-text">
            <h2 class="text-4xl font-semibold mb-4">Contáctanos</h2>
            <div class="bt-option">
                <a href="/" class="text-lg text-gray-300">Inicio</a>
                <span class="text-lg text-gray-300"> / Contáctanos</span>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Contact Section Begin -->
<section class="py-16 bg-gray-900">
    <div class="container mx-auto text-center">
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-white mb-6">Contáctanos</h2>
            <p class="text-lg text-gray-300">¡Nos encantaría saber de ti! Llena el formulario para ponerte en contacto con nosotros.</p>
        </div>
        <div class="flex justify-center">
            <div class="w-full max-w-md">
                <div class="bg-white p-8 rounded-xl shadow-lg">
                    <form id="contactForm">
                        <div class="mb-4">
                            <input type="text" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="name" placeholder="Nombre">
                        </div>
                        <div class="mb-4">
                            <input type="email" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="email" placeholder="Email">
                        </div>
                        <div class="mb-4">
                            <input type="text" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="numero" placeholder="Número">
                        </div>
                        <div class="mb-4">
                            <textarea class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="comment" placeholder="Comentario"></textarea>
                        </div>
                        <button type="button" class="w-full py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none" onclick="submitForm()">Enviar</button>
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
