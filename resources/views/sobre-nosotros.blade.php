@extends('layouts.app')

@section('content')
    <title>FitWeb Sobre Nosotros</title>

    <!-- Breadcrumb Section Begin -->
    <section class="bg-cover bg-center py-16" style="background-image: url('img/breadcrumb-bg.jpg');">
        <div class="container text-center text-white">
            <h2 class="text-4xl font-bold mb-2">Sobre Nosotros</h2>
            <div class="bt-option">
                <a href="/" class="text-white text-lg">Inicio</a>
                <span class="text-white text-lg">Sobre Nosotros</span>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- About Section -->
    <section class="py-16 bg-gray-800 text-white">
        <div class="container mx-auto">
            <div class="flex flex-col lg:flex-row gap-16 lg:gap-32">
                <div class="lg:w-1/2 mx-auto">
                    <img src="img/about-us.jpg" class="w-full h-auto rounded-xl shadow-lg" alt="Nuestro equipo">
                </div>
                <div class="lg:w-1/2 mx-auto text-center">
                    <div class="section-title mb-8">
                        <span class="text-primary font-semibold text-lg">Nuestra Historia</span>
                        <h2 class="text-3xl font-bold mb-4">Transformando la gestión de gimnasios desde 2025</h2>
                    </div>
                    <p class="text-lg text-gray-300 mb-8">En FitWeb combinamos pasión por el fitness con tecnología
                        innovadora para ofrecer la solución más completa en gestión deportiva. Nuestro equipo de expertos en
                        software y gestión deportiva trabaja para simplificar las operaciones diarias de tu gimnasio.</p>

                    <div class="flex flex-wrap gap-16 mb-8 justify-center">
                        <div class="af-item flex items-center space-x-4 mb-4">
                            <i class="fas fa-dumbbell text-3xl text-primary"></i>
                            <div>
                                <h4 class="text-xl font-semibold">+6 Gimnasios</h4>
                                <p class="text-sm text-gray-400">Confían en nuestra plataforma</p>
                            </div>
                        </div>
                        <div class="af-item flex items-center space-x-4 mb-4">
                            <i class="fas fa-chart-line text-3xl text-primary"></i>
                            <div>
                                <h4 class="text-xl font-semibold">100% Satisfacción</h4>
                                <p class="text-sm text-gray-400">Clientes satisfechos</p>
                            </div>
                        </div>
                    </div>

                    <a href="contactanos"
                        class="bg-primary text-white py-2 px-6 rounded-md text-lg hover:bg-primary-dark transition">Ver
                        demostración</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="py-16 bg-gray-700 text-white">
        <div class="container mx-auto">
            <div class="flex flex-wrap gap-16 lg:gap-24 justify-center">
                <div class="lg:w-1/3 text-center">
                    <div class="af-item flex items-center space-x-4">
                        <i class="fas fa-bullseye text-3xl text-primary"></i>
                        <div>
                            <h4 class="text-xl font-semibold">Misión</h4>
                            <p>Empoderar a los gimnasios con herramientas tecnológicas que optimicen su gestión y mejoren la
                                experiencia de sus clientes.</p>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/3 text-center">
                    <div class="af-item flex items-center space-x-4">
                        <i class="fas fa-eye text-3xl text-primary"></i>
                        <div>
                            <h4 class="text-xl font-semibold">Visión</h4>
                            <p>Ser líderes globales en soluciones SaaS para la industria del fitness y el bienestar.</p>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/3 text-center">
                    <div class="af-item flex items-center space-x-4">
                        <i class="fas fa-heart text-3xl text-primary"></i>
                        <div>
                            <h4 class="text-xl font-semibold">Valores</h4>
                            <p>Innovación constante, soporte excepcional y compromiso con el éxito de nuestros clientes.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-16 bg-gray-800 text-white">
        <div class="container mx-auto text-center">
            <div class="section-title mb-12">
                <span class="text-primary font-semibold text-lg">Conoce al Equipo</span>
                <h2 class="text-3xl font-bold mb-8">Nuestros Expertos</h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-16 justify-center">
                <!-- Miembro 1 -->
                <div
                    class="ts-item relative rounded-xl shadow-lg overflow-hidden transition-transform transform hover:scale-105">
                    <div class="bg-cover bg-center h-80" style="background-image: url('img/team/carlos.jpg');"></div>
                    <div class="absolute inset-0 bg-black bg-opacity-50 p-4 flex items-end justify-center">
                        <div class="text-white text-center p-4">
                            <h4 class="text-2xl font-semibold mb-2">Carlos Mantilla</h4>
                            <span class="text-lg">Fundador</span>
                            <div class="tt-social mt-2">
                                <a href="https://github.com/CarlosMantillaC" class="text-white"><i
                                        class="fab fa-github text-2xl"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Miembro 2 -->
                <div
                    class="ts-item relative rounded-xl shadow-lg overflow-hidden transition-transform transform hover:scale-105">
                    <div class="bg-cover bg-center h-80" style="background-image: url('img/team/arturito.jpg');"></div>
                    <div class="absolute inset-0 bg-black bg-opacity-50 p-4 flex items-end justify-center">
                        <div class="text-white text-center p-4">
                            <h4 class="text-2xl font-semibold mb-2">David Aceros</h4>
                            <span class="text-lg">Fundador</span>
                            <div class="tt-social mt-2">
                                <a href="https://github.com/AcerosDavid" class="text-white"><i
                                        class="fab fa-github text-2xl"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Miembro 3 -->
                <div
                    class="ts-item relative rounded-xl shadow-lg overflow-hidden transition-transform transform hover:scale-105">
                    <div class="bg-cover bg-center h-80" style="background-image: url('img/team/isaac.jpg');"></div>
                    <div class="absolute inset-0 bg-black bg-opacity-50 p-4 flex items-end justify-center">
                        <div class="text-white text-center p-4">
                            <h4 class="text-2xl font-semibold mb-2">Isaac Diaz</h4>
                            <span class="text-lg">El Fundador</span>
                            <div class="tt-social mt-2">
                                <a href="https://github.com/isaacDiazR" class="text-white"><i
                                        class="fab fa-github text-2xl"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
