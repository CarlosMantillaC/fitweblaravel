@extends('layouts.app')

@section('content')

<title>FitWeb - Servicios para Gestión de Gimnasios</title>


<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb-text">
                    <h2>Funcionalidades</h2>
                    <div class="bt-option">
                        <a href="/">Inicio</a>
                        <span>Funcionalidades</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Service Section -->
<section class="fitweb-services spad">
    <div class="container">
        <div class="section-title">
            <span>Características principales</span>
            <h2>Todo lo que necesitas en una plataforma</h2>
        </div>

        <div class="row">
            <!-- Panel de Control -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card">
                    <div class="icon-container">
                        <i class="fas fa-tachometer-alt fa-2x"></i>
                    </div>
                    <h4>Panel de Control</h4>
                    <ul class="feature-list">
                        <li>Métricas en tiempo real</li>
                        <li>Seguimiento de ingresos</li>
                        <li>Análisis de tendencias</li>
                        <li>Acceso rápido</li>
                    </ul>
                </div>
            </div>

            <!-- Gestión de Clientes -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card">
                    <div class="icon-container">
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                    <h4>Gestión de Clientes</h4>
                    <ul class="feature-list">
                        <li>Perfiles detallados</li>
                        <li>Control de membresías</li>
                        <li>Registro de asistencia</li>
                        <li>Renovaciones automáticas</li>
                    </ul>
                </div>
            </div>

            <!-- Gestión de Empleados -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card">
                    <div class="icon-container">
                        <i class="fas fa-user-tie fa-2x"></i>
                    </div>
                    <h4>Gestión de Empleados</h4>
                    <ul class="feature-list">
                        <li>Horarios personalizados</li>
                        <li>Control de disponibilidad</li>
                        <li>Sistema de check-in</li>
                        <li>Optimización de recursos</li>
                    </ul>
                </div>
            </div>

            <!-- Programación -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card">
                    <div class="icon-container">
                        <i class="fas fa-calendar-alt fa-2x"></i>
                    </div>
                    <h4>Programación</h4>
                    <ul class="feature-list">
                        <li>Calendario interactivo</li>
                        <li>Reservas en tiempo real</li>
                        <li>Control de cupos</li>
                        <li>Notificaciones automáticas</li>
                    </ul>
                </div>
            </div>

            <!-- Analytics -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card">
                    <div class="icon-container">
                        <i class="fas fa-chart-bar fa-2x"></i>
                    </div>
                    <h4>Reportes Avanzados</h4>
                    <ul class="feature-list">
                        <li>Gráficos interactivos</li>
                        <li>Comparativas mensuales</li>
                        <li>Análisis de horas pico</li>
                        <li>Exportación de datos</li>
                    </ul>
                </div>
            </div>

            <!-- Seguridad -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card">
                    <div class="icon-container">
                        <i class="fas fa-shield-alt fa-2x"></i>
                    </div>
                    <h4>Seguridad Integral</h4>
                    <ul class="feature-list">
                        <li>Encriptación de datos</li>
                        <li>Copias de seguridad</li>
                        <li>Acceso multi-nivel</li>
                        <li>Protección anti-fraude</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section set-bg" data-setbg="img/cta-bg.jpg">
    <div class="container">
        <div class="cta-content">
            <h2 class="text-white">¿Listo para revolucionar tu gestión?</h2>
            <p class="text-white-opaque">Prueba FitWeb gratis durante 30 días</p>
            <a href="contacto" class="primary-btn">Comenzar prueba gratuita</a>
            <p class="text-white-opaque small mt-3">Sin tarjeta de crédito requerida</p>
        </div>
    </div>
</section>

@endsection