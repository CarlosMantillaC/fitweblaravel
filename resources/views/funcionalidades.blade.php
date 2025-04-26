@extends('layouts.app')

@section('content')
    <title>FitWeb Funcionalidades</title>

    <!-- Breadcrumb Section Begin -->
    <section class="bg-cover bg-center py-20" style="background-image: url('/img/breadcrumb-bg.jpg')" data-aos="fade-in"
        data-aos-duration="1500">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold text-white mb-4">Funcionalidades</h2>
            <div class="text-white space-x-2">
                <a href="/" class="hover:underline transition-all">Inicio</a>
                <span>/</span>
                <span>Funcionalidades</span>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Service Section -->
    <section class="py-20 bg-gray-100" data-aos="fade-up" data-aos-duration="1500">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <span class="text-primary font-semibold uppercase">Características principales</span>
                <h2 class="text-3xl font-bold mt-2">Todo lo que necesitas en una plataforma</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Panel de Control -->
                <div
                    class="bg-white rounded-lg shadow-lg p-6 text-center transform transition-all duration-500 hover:scale-105 hover:shadow-xl hover:cursor-pointer">
                    <div class="flex justify-center mb-4 text-primary">
                        <i
                            class="fas fa-tachometer-alt text-5xl transition-transform duration-1000 hover:rotate-[360deg]"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-4 text-gray-800 hover:text-white">Panel de Control</h4>
                    <ul class="text-gray-600 space-y-2">
                        <li>Métricas en tiempo real</li>
                        <li>Seguimiento de ingresos</li>
                        <li>Análisis de tendencias</li>
                        <li>Acceso rápido</li>
                    </ul>
                </div>

                <!-- Gestión de Clientes -->
                <div
                    class="bg-white rounded-lg shadow-lg p-6 text-center transform transition-all duration-500 hover:scale-105 hover:shadow-xl hover:cursor-pointer">
                    <div class="flex justify-center mb-4 text-primary">
                        <i class="fas fa-users text-5xl transition-transform duration-1000 hover:rotate-[360deg]"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-4 text-gray-800 hover:text-white">Gestión de Clientes</h4>
                    <ul class="text-gray-600 space-y-2">
                        <li>Perfiles detallados</li>
                        <li>Control de membresías</li>
                        <li>Registro de asistencia</li>
                        <li>Renovaciones automáticas</li>
                    </ul>
                </div>

                <!-- Gestión de Empleados -->
                <div class="bg-white rounded-lg shadow-lg p-6 text-center transform transition-all duration-500 hover:scale-105 hover:shadow-xl hover:cursor-pointer">
                    <div class="flex justify-center mb-4 text-primary">
                        <i class="fas fa-user-tie text-5xl transition-transform duration-1000 hover:rotate-[360deg]"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-4 text-gray-800 hover:text-white">Gestión de Empleados</h4>
                    <ul class="text-gray-600 space-y-2">
                        <li>Horarios personalizados</li>
                        <li>Control de disponibilidad</li>
                        <li>Sistema de check-in</li>
                        <li>Optimización de recursos</li>
                    </ul>
                </div>
                <!-- Programación -->
                <div
                    class="bg-white rounded-lg shadow-lg p-6 text-center transform transition duration-300 hover:scale-105 hover:shadow-xl hover:bg-primary">
                    <div class="flex justify-center mb-4 text-primary">
                        <i class="fas fa-calendar-alt text-5xl"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-4 text-gray-800 hover:text-white">Programación</h4>
                    <ul class="text-gray-600 space-y-2">
                        <li>Calendario interactivo</li>
                        <li>Reservas en tiempo real</li>
                        <li>Control de cupos</li>
                        <li>Notificaciones automáticas</li>
                    </ul>
                </div>

                <!-- Reportes Avanzados -->
                <div
                    class="bg-white rounded-lg shadow-lg p-6 text-center transform transition duration-300 hover:scale-105 hover:shadow-xl hover:bg-primary">
                    <div class="flex justify-center mb-4 text-primary">
                        <i class="fas fa-chart-bar text-5xl"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-4 text-gray-800 hover:text-white">Reportes Avanzados</h4>
                    <ul class="text-gray-600 space-y-2">
                        <li>Gráficos interactivos</li>
                        <li>Comparativas mensuales</li>
                        <li>Análisis de horas pico</li>
                        <li>Exportación de datos</li>
                    </ul>
                </div>

                <!-- Seguridad Integral -->
                <div
                    class="bg-white rounded-lg shadow-lg p-6 text-center transform transition duration-300 hover:scale-105 hover:shadow-xl hover:bg-primary">
                    <div class="flex justify-center mb-4 text-primary">
                        <i class="fas fa-shield-alt text-5xl"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-4 text-gray-800 hover:text-white">Seguridad Integral</h4>
                    <ul class="text-gray-600 space-y-2">
                        <li>Encriptación de datos</li>
                        <li>Copias de seguridad</li>
                        <li>Acceso multi-nivel</li>
                        <li>Protección anti-fraude</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Banner Section -->
    <section class="bg-cover bg-center py-20" style="background-image: url('/img/banner.png')" data-aos="fade-up"
        data-aos-duration="1500">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold text-white mb-4">Contáctanos para obtener más información</h2>
            <p class="text-white mb-8">Donde el fitness y la tecnología se encuentran.</p>
            <a href="/contactanos"
                class="bg-primary hover:bg-primary-dark text-white py-3 px-6 rounded-full font-semibold transition-all ease-in-out duration-300">Obtener
                información</a>
        </div>
    </section>
@endsection
