@extends('layouts.app')

@section('content')

<title>FitWeb Contactanos</title>

<!-- Breadcrumb Section Begin -->
<section class="relative bg-cover bg-center py-50" style="background-image: url('/img/breadcrumb-bg.jpg')"
        data-aos="fade-in">
        <!-- Overlay negro con opacidad -->
        <div class="absolute inset-0 bg-black/70"></div>

        <div class="container relative z-10 mx-auto px-4 text-center">
            <h2 class="text-6xl font-extrabold text-white mb-6">Contáctanos</h2>
            <div class="text-white space-x-2 text-lg">
                <a href="/" class="hover:underline transition-all">Inicio</a>
                <span>></span>
                <span class="text-tertiary">Contáctanos</span>
            </div>
        </div>
    </section>
<!-- Breadcrumb Section End -->

<!-- Contact Section Begin -->
<section class="py-16 bg-[#151515]">
  <div class="container mx-auto text-center">
    <div class="mb-12">
      <h2 class="text-3xl font-bold text-[#f36100] mb-6">Contáctanos</h2>
      <p class="text-lg text-gray-300">¡Nos encantaría saber de ti! Llena el formulario para ponerte en contacto con nosotros.</p>
    </div>
    <div class="flex justify-center">
      <div class="w-full max-w-md">
        <div class="bg-[#151515] p-8 rounded-xl shadow-lg border border-gray-700">
          <form id="contactForm" action="https://formspree.io/f/xblolwzo" method="POST">
            <div class="mb-4">
              <input type="text" name="name" required
                class="w-full p-4 bg-[#252525] text-white border border-gray-600 rounded-lg
                focus:border-[#f36100] focus:ring focus:ring-[#f36100]/80 focus:outline-none 
                transition-all duration-500 font-light"
                placeholder="Nombre">
            </div>
            <div class="mb-4">
              <input type="email" name="email" required
                class="w-full p-4 bg-[#252525] text-white border border-gray-600 rounded-lg
                focus:border-[#f36100] focus:ring focus:ring-[#f36100]/80 focus:outline-none 
                transition-all duration-500 font-light"
                placeholder="Email">
            </div>
            <div class="mb-4">
              <input type="text" name="numero"
                class="w-full p-4 bg-[#252525] text-white border border-gray-600 rounded-lg
                focus:border-[#f36100] focus:ring focus:ring-[#f36100]/80 focus:outline-none 
                transition-all duration-500 font-light"
                placeholder="Número">
            </div>
            <div class="mb-4">
              <textarea name="comment" rows="4"
                class="w-full p-4 bg-[#252525] text-white border border-gray-600 rounded-lg
                focus:border-[#f36100] focus:ring focus:ring-[#f36100]/80 focus:outline-none 
                transition-all duration-500 font-light"
                placeholder="Comentario"></textarea>
            </div>
            <button type="submit" id="submitButton"
              class="flex justify-center items-center gap-2 w-full py-3 bg-[#f36100] text-white rounded-lg hover:bg-[#e05500] hover:text-[#151515]
              focus:outline-none focus:ring-2 focus:ring-[#f36100]/80 transition-all duration-300 relative">
              <span id="buttonText">Enviar</span>
              <span id="spinner" class="hidden animate-spin rounded-full h-5 w-5 border-t-2 border-b-2 border-white"></span>
            </button>

            <!-- Mensaje de éxito oculto -->
            <p id="successMessage" class="text-green-400 mt-4 hidden">¡Mensaje enviado correctamente! Redireccionando...</p>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  const form = document.getElementById('contactForm');
  const successMessage = document.getElementById('successMessage');
  const submitButton = document.getElementById('submitButton');
  const spinner = document.getElementById('spinner');
  const buttonText = document.getElementById('buttonText');

  form.addEventListener('submit', async function(event) {
    event.preventDefault(); // Evita recargar la página

    // Mostrar spinner y desactivar botón
    spinner.classList.remove('hidden');
    buttonText.classList.add('hidden');
    submitButton.disabled = true;

    const formData = new FormData(form);

    try {
      const response = await fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
          'Accept': 'application/json'
        }
      });

      if (response.ok) {
        form.reset();
        successMessage.classList.remove('hidden');
        
        setTimeout(() => {
          window.location.href = 'gracias.html'; // Tu página de gracias
        }, 2500);
      } else {
        alert('Algo salió mal. El formulario no pudo enviarse.');
      }
    } catch (error) {
      alert('Error en la conexión. Inténtalo más tarde.');
    } finally {
      // Ocultar spinner y reactivar botón (por si hay error)
      spinner.classList.add('hidden');
      buttonText.classList.remove('hidden');
      submitButton.disabled = false;
    }
  });
</script>




@endsection
