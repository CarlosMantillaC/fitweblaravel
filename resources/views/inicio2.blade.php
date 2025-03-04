@extends('layouts.app')

@section('content')
<!-- Hero Section Begin-->
<section class="hero-section">
    <div class="hs-slider owl-carousel">
        <div class="hs-item set-bg" data-setbg="img//hero/hero1.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-4">
                        <div class="hi-text">
                            <span>Revolucionando la gestión de gimnasios</span>
                            <h1><strong>FitWeb</strong> - Tu Socio Digital</h1>
                            <a href="#contacto" class="primary-btn">Agendar Demo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Problem Section Begin -->
<section class="choseus-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Problemas que Resolvemos</span>
                    <h2>GESTIÓN DE GIMNASIOS 4.0</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="cs-item">
                    <span class="flaticon-016-fitness"></span>
                    <h4>Automatización Integral</h4>
                    <p>Elimina procesos manuales en reservas, pagos y control de acceso con nuestra plataforma todo-en-uno</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="cs-item">
                    <span class="flaticon-004-measuring-tape"></span>
                    <h4>Toma de Decisiones Inteligente</h4>
                    <p>Dashboard ejecutivo con métricas clave para una gestión basada en datos reales</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="cs-item">
                    <span class="flaticon-028-weightlifting"></span>
                    <h4>Escalabilidad Garantizada</h4>
                    <p>Solución adaptable para gimnasios pequeños y medianos sin costos adicionales por crecimiento</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Problem Section End -->

<!-- Features Section Begin -->
<section class="classes-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Funcionalidades Clave</span>
                    <h2>PLATAFORMA TODO-EN-UNO</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="class-item">
                    <div class="ci-pic">
                        <img src="img/classes/dashboard.png" alt="Panel de Control">
                    </div>
                    <div class="ci-text">
                        <span><i class="fa fa-tachometer"></i> Dashboard Inteligente</span>
                        <h5>Métricas en Tiempo Real</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="class-item">
                    <div class="ci-pic">
                        <img src="img/classes/customer-management.png" alt="Gestión de Clientes">
                    </div>
                    <div class="ci-text">
                        <span><i class="fa fa-users"></i> Gestión de Clientes</span>
                        <h5>Perfiles Detallados + Historial Completo</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="class-item">
                    <div class="ci-pic">
                        <img src="img/classes/calender.png" alt="Calendario Interactivo">
                    </div>
                    <div class="ci-text">
                        <span><i class="fa fa-line-chart"></i> Calendario Interactivo</span>
                        <h5>Programación + Reservas</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Features Section End -->

<!-- Benefits Section Begin -->
<section class="banner-section set-bg" data-setbg="img/classes/background-gym.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="bs-text">
                    <div class="section-title" id="benefits-title">
                        <h2>Beneficios para Administradores</h2>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-4 mb-4 mb-md-0">
                            <div class="benefit-item text-center">
                                <i class="fa fa-clock-o fa-2x fa-md-4x"></i>
                                <h3 class="fs-5 fs-md-3">+40% Eficiencia</h3>
                                <h4 class="fs-6 fs-md-4">Automatización de procesos</h4>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4 mb-md-0">
                            <div class="benefit-item text-center">
                                <i class="fa fa-money fa-2x fa-md-4x"></i>
                                <h3 class="fs-5 fs-md-3">-30% Errores</h3>
                                <h4 class="fs-6 fs-md-4">Gestión financiera precisa</h4>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4 mb-md-0">
                            <div class="benefit-item text-center">
                                <i class="fa fa-line-chart fa-2x fa-md-4x"></i>
                                <h3 class="fs-5 fs-md-3">+25% Retención</h3>
                                <h4 class="fs-6 fs-md-4">Clientes satisfechos</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- Benefits Section End -->
<section class="team-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title"> <!-- Agregar text-white -->
                    <span>Modelo de Negocio</span>
                    <h2>INVERSIÓN INTELIGENTE</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="pricing-card text-white"> <!-- Agregar text-white -->
                    <h4><i class="fa fa-rocket text-white"></i> Plan Único</h4> <!-- Agregar text-white -->
                    <div class="price text-white">$99<span>/mes</span></div> <!-- Agregar text-white -->
                    <ul class="text-white"> <!-- Agregar text-white -->
                        <li>Usuarios Ilimitados</li>
                        <li>Soporte 24/7 Prioritario</li>
                        <li>Todas las Funcionalidades</li>
                        <li>Actualizaciones Gratuitas</li>
                        <li>Capacitación Incluida</li>
                    </ul>
                    <a href="#contacto" class="primary-btn text-white">Prueba Gratis</a> <!-- Agregar text-white -->
                </div>
            </div>
            <div class="col-md-8">
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="feature-item text-white"> <!-- Agregar text-white -->
                            <i class="fa fa-shield fa-2x text-white"></i> <!-- Agregar text-white -->
                            <h4>Garantía de Satisfacción</h4>
                            <p>30 días de prueba sin riesgo con reembolso total</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="feature-item text-white"> <!-- Agregar text-white -->
                            <i class="fa fa-cloud-upload fa-2x text-white"></i> <!-- Agregar text-white -->
                            <h4>Implementación Rápida</h4>
                            <p>Migración de datos gratuita y configuración asistida</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Problem Section Begin -->
<section class="choseus-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Modelo de Negocio</span>
                    <h2>INVERSIÓN INTELIGENTE</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="cs-item">
                    <span class="fa fa-rocket"></span>
                    <h4>Plan Único</h4>
                    <ul class="text-white-opaque"> <!-- Agregar text-white -->
                        <li>Usuarios Ilimitados</li>
                        <li>Soporte 24/7 Prioritario</li>
                        <li>Todas las Funcionalidades</li>
                        <li>Actualizaciones Gratuitas</li>
                        <li>Capacitación Incluida</li>
                    </ul>
                    <p>Elimina procesos manuales en reservas, pagos y control de acceso con nuestra plataforma todo-en-uno</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="cs-item">
                    <span class="flaticon-004-measuring-tape"></span>
                    <h4>Toma de Decisiones Inteligente</h4>
                    <p>Dashboard ejecutivo con métricas clave para una gestión basada en datos reales</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="cs-item">
                    <span class="flaticon-028-weightlifting"></span>
                    <h4>Escalabilidad Garantizada</h4>
                    <p>Solución adaptable para gimnasios pequeños y medianos sin costos adicionales por crecimiento</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Problem Section End -->


<!-- CTA Section Begin -->
<section class="gallery-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="cta-content">
                    <h2>¿Listo para Transformar tu Gimnasio?</h2>
                    <p>Programa una demostración personalizada y recibe un plan de implementación gratuito</p>
                    <a href="#contacto" class="primary-btn">Comenzar Ahora</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection