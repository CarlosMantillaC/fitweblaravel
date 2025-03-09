@extends('layouts.app')

@section('content')

<title>FitWeb Funcionalidades</title>


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

<section class="banner-section set-bg" data-setbg="img/banner.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="bs-text">
                    <h2>Contactanos para obtener más información</h2>
                    <div class="bt-tips">Donde el fitness y la tecnología se encuentran.</div>
                    <a href="contactanos" class="primary-btn  btn-normal">Obtener información</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection