@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section class="relative h-screen flex items-center bg-cover bg-center" style="background-image: url('img/hero/hero8.png')">
    <div class="absolute inset-0 bg-opacity-50"></div>
    <div class="container mx-auto px-4 z-10">
        <div class="flex flex-col lg:flex-row">
            <div class="lg:w-1/2"></div>
            <div class="lg:w-1/2 text-white">
                <div class="space-y-6">
                    <span class="text-lg font-semibold text-orange-400">Revolucionando la gestión de gimnasios</span>
                    <h1 class="text-4xl md:text-6xl font-bold leading-tight"><span class="text-orange-400">FitWeb</span> - Tu Socio Digital</h1>
                    <a href="contactanos" class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-8 rounded transition duration-300">Agendar Demo</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Problem Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <span class="text-orange-500 font-semibold">Problemas que Resolvemos</span>
            <h2 class="text-3xl md:text-4xl font-bold mt-2">GESTIÓN DE GIMNASIOS</h2>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Item 1 -->
            <div class="bg-white p-8 rounded-lg shadow-md text-center hover:shadow-lg transition duration-300">
                <div class="text-orange-500 text-4xl mb-4">
                    <i class="fas fa-robot"></i>
                </div>
                <h4 class="text-xl font-bold mb-3">Automatización Integral</h4>
                <p class="text-gray-600">Elimina procesos manuales en reservas, pagos y control de acceso con nuestra plataforma todo-en-uno</p>
            </div>
            
            <!-- Item 2 -->
            <div class="bg-white p-8 rounded-lg shadow-md text-center hover:shadow-lg transition duration-300">
                <div class="text-orange-500 text-4xl mb-4">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h4 class="text-xl font-bold mb-3">Toma de Decisiones Inteligente</h4>
                <p class="text-gray-600">Dashboard ejecutivo con métricas clave para una gestión basada en datos reales</p>
            </div>
            
            <!-- Item 3 -->
            <div class="bg-white p-8 rounded-lg shadow-md text-center hover:shadow-lg transition duration-300">
                <div class="text-orange-500 text-4xl mb-4">
                    <i class="fas fa-expand"></i>
                </div>
                <h4 class="text-xl font-bold mb-3">Escalabilidad Garantizada</h4>
                <p class="text-gray-600">Solución adaptable para gimnasios pequeños y medianos sin costos adicionales por crecimiento</p>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-20">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <span class="text-orange-500 font-semibold">Funcionalidades Clave</span>
            <h2 class="text-3xl md:text-4xl font-bold mt-2">PLATAFORMA TODO-EN-UNO</h2>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300">
                <img src="img/classes/dashboard.png" alt="Panel de Control" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="flex items-center text-orange-500 mb-2">
                        <i class="fas fa-tachometer-alt mr-2"></i>
                        <span class="font-semibold">Dashboard Inteligente</span>
                    </div>
                    <h5 class="text-lg font-bold">Métricas en Tiempo Real</h5>
                </div>
            </div>
            
            <!-- Feature 2 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300">
                <img src="img/classes/customer-management.png" alt="Gestión de Clientes" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="flex items-center text-orange-500 mb-2">
                        <i class="fas fa-users mr-2"></i>
                        <span class="font-semibold">Gestión de Clientes</span>
                    </div>
                    <h5 class="text-lg font-bold">Perfiles Detallados + Historial Completo</h5>
                </div>
            </div>
            
            <!-- Feature 3 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300">
                <img src="img/classes/calender.png" alt="Calendario Interactivo" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="flex items-center text-orange-500 mb-2">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        <span class="font-semibold">Calendario Interactivo</span>
                    </div>
                    <h5 class="text-lg font-bold">Programación + Reservas</h5>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section class="py-20 bg-cover bg-center" style="background-image: url('img/classes/gym-background.jpg')">
    <div class="bg-black bg-opacity-70 py-20">
        <div class="container mx-auto px-4">
            <div class="text-center text-white mb-16">
                <h2 class="text-3xl md:text-4xl font-bold">Beneficios para Administradores</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Benefit 1 -->
                <div class="text-center text-white">
                    <div class="text-orange-500 text-4xl mb-4">
                        <i class="far fa-clock"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-2">+ Eficiencia</h3>
                    <h4 class="text-lg">Automatización de procesos</h4>
                </div>
                
                <!-- Benefit 2 -->
                <div class="text-center text-white">
                    <div class="text-orange-500 text-4xl mb-4">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-2">- Errores</h3>
                    <h4 class="text-lg">Gestión financiera precisa</h4>
                </div>
                
                <!-- Benefit 3 -->
                <div class="text-center text-white">
                    <div class="text-orange-500 text-4xl mb-4">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-2">+ Retención</h3>
                    <h4 class="text-lg">Clientes satisfechos</h4>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Business Model Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <span class="text-orange-500 font-semibold">Modelo de Negocio</span>
            <h2 class="text-3xl md:text-4xl font-bold mt-2">INVERSIÓN INTELIGENTE</h2>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Plan 1 -->
            <div class="text-center">
                <div class="text-orange-500 text-4xl mb-4">
                    <i class="fas fa-rocket"></i>
                </div>
                <h4 class="text-xl font-bold mb-3">Plan Único</h4>
                <p class="text-gray-600">Incluye todas las funcionalidades para administradores, sin límite de usuarios o transacciones.</p>
            </div>
            
            <!-- Plan 2 -->
            <div class="text-center">
                <div class="text-orange-500 text-4xl mb-4">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h4 class="text-xl font-bold mb-3">Garantía de Satisfacción</h4>
                <p class="text-gray-600">30 días de prueba totalmente gratuita.</p>
            </div>
            
            <!-- Plan 3 -->
            <div class="text-center">
                <div class="text-orange-500 text-4xl mb-4">
                    <i class="fas fa-headset"></i>
                </div>
                <h4 class="text-xl font-bold mb-3">Soporte Prioritario</h4>
                <p class="text-gray-600">Asistencia técnica 24/7, capacitación inicial y actualizaciones gratuitas.</p>
            </div>
        </div>
    </div>
</section>

<!-- Banner Section -->
<section class="py-32 bg-cover bg-center" style="background-image: url('img/banner.png')">
    <div class="bg-black bg-opacity-60 py-20">
        <div class="container mx-auto px-4">
            <div class="text-center text-white">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Contáctanos para obtener más información</h2>
                <p class="text-xl mb-8">Donde el fitness y la tecnología se encuentran.</p>
                <a href="contactanos" class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-8 rounded transition duration-300">Obtener información</a>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<div class="container mx-auto px-4 py-20">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="md:col-span-2 relative group">
            <img src="img/gallery/gallery-9.jpg" alt="Gallery 1" class="w-full h-64 md:h-96 object-cover rounded-lg">
            <a href="img/gallery/gallery-9.jpg" class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-0 group-hover:bg-opacity-50 transition duration-300">
                <i class="fas fa-expand text-white text-2xl opacity-0 group-hover:opacity-100 transition duration-300"></i>
            </a>
        </div>
        
        <div class="relative group">
            <img src="img/gallery/gallery-2.jpg" alt="Gallery 2" class="w-full h-64 object-cover rounded-lg">
            <a href="img/gallery/gallery-2.jpg" class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-0 group-hover:bg-opacity-50 transition duration-300">
                <i class="fas fa-expand text-white text-2xl opacity-0 group-hover:opacity-100 transition duration-300"></i>
            </a>
        </div>
        
        <div class="relative group">
            <img src="img/gallery/gallery-3.jpg" alt="Gallery 3" class="w-full h-64 object-cover rounded-lg">
            <a href="img/gallery/gallery-3.jpg" class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-0 group-hover:bg-opacity-50 transition duration-300">
                <i class="fas fa-expand text-white text-2xl opacity-0 group-hover:opacity-100 transition duration-300"></i>
            </a>
        </div>
        
        <div class="relative group">
            <img src="img/gallery/gallery-4.jpg" alt="Gallery 4" class="w-full h-64 object-cover rounded-lg">
            <a href="img/gallery/gallery-4.jpg" class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-0 group-hover:bg-opacity-50 transition duration-300">
                <i class="fas fa-expand text-white text-2xl opacity-0 group-hover:opacity-100 transition duration-300"></i>
            </a>
        </div>
        
        <div class="relative group">
            <img src="img/gallery/gallery-5.jpg" alt="Gallery 5" class="w-full h-64 object-cover rounded-lg">
            <a href="img/gallery/gallery-5.jpg" class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-0 group-hover:bg-opacity-50 transition duration-300">
                <i class="fas fa-expand text-white text-2xl opacity-0 group-hover:opacity-100 transition duration-300"></i>
            </a>
        </div>
        
        <div class="md:col-span-2 relative group">
            <img src="img/gallery/gallery-6.jpg" alt="Gallery 6" class="w-full h-64 md:h-96 object-cover rounded-lg">
            <a href="img/gallery/gallery-6.jpg" class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-0 group-hover:bg-opacity-50 transition duration-300">
                <i class="fas fa-expand text-white text-2xl opacity-0 group-hover:opacity-100 transition duration-300"></i>
            </a>
        </div>
    </div>
</div>

<!-- Simple Lightbox for Gallery (Vanilla JS alternative) -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const galleryLinks = document.querySelectorAll('a[href^="img/gallery/"]');
        
        galleryLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const imgSrc = this.getAttribute('href');
                const lightbox = document.createElement('div');
                lightbox.className = 'fixed inset-0 bg-black bg-opacity-90 z-50 flex items-center justify-center p-4';
                lightbox.innerHTML = `
                    <div class="relative max-w-4xl w-full">
                        <img src="${imgSrc}" class="max-h-screen w-full object-contain" alt="Gallery Image">
                        <button class="absolute top-4 right-4 text-white text-3xl">&times;</button>
                    </div>
                `;
                
                document.body.appendChild(lightbox);
                
                lightbox.querySelector('button').addEventListener('click', function() {
                    document.body.removeChild(lightbox);
                });
            });
        });
    });
</script>

@endsection