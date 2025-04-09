@extends('layouts.app')

@section('content')

<title>FitWeb Sobre Nosotros</title>


<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb-text">
                    <h2>Sobre Nosotros</h2>
                    <div class="bt-option">
                        <a href="/">Inicio</a>
                        <span>Sobre Nosotros</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- About Section -->
<section class="about-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-pic">
                    <img src="img/about-us.jpg" class="img-fluid" alt="Nuestro equipo">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-text">
                    <div class="section-title">
                        <span>Nuestra Historia</span>
                        <h2>Transformando la gestión de gimnasios desde 2025</h2>
                    </div>
                    <p class="text-white-opaque">En FitWeb combinamos pasión por el fitness con tecnología innovadora para ofrecer la solución más completa en gestión deportiva. Nuestro equipo de expertos en software y gestión deportiva trabaja para simplificar las operaciones diarias de tu gimnasio.</p>

                    <div class="about-features">
                        <div class="af-item">
                            <i class="fas fa-dumbbell"></i>
                            <h4>+6 Gimnasios</h4>
                            <p>Confían en nuestra plataforma</p>
                        </div>
                        <div class="af-item">
                            <i class="fas fa-chart-line"></i>
                            <h4>100% Satisfacción</h4>
                            <p>Clientes satisfechos</p>
                        </div>
                    </div>

                    <a href="contactanos" class="primary-btn">Ver demostración</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission Section -->
<section class="mision-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="af-item">
                    <i class="fas fa-bullseye"></i>
                    <h4>Misión</h4>
                    <p>Empoderar a los gimnasios con herramientas tecnológicas que optimicen su gestión y mejoren la experiencia de sus clientes.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="af-item">
                    <i class="fas fa-eye"></i>
                    <h4>Visión</h4>
                    <p>Ser líderes globales en soluciones SaaS para la industria del fitness y el bienestar.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="af-item">
                    <i class="fas fa-heart"></i>
                    <h4>Valores</h4>
                    <p>Innovación constante, soporte excepcional y compromiso con el éxito de nuestros clientes.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="team-section team-page spad">
    <div class="container">
        <div class="section-title">
            <span>Conoce al Equipo</span>
            <h2>Nuestros Expertos</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-sm-6 mb-4 text-center">
                <div class="ts-item set-bg" data-setbg="img/team/carlos.jpg">
                    <div class="ts_text">
                        <h4>Carlos Mantilla</h4>
                        <span>Fundador</span>
                        <div class="tt-social">
                            <a href="https://github.com/CarlosMantillaC"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-4 text-center">
                <div class="ts-item set-bg" data-setbg="img/team/arturito.jpg">
                    <div class="ts_text">
                        <h4>David Aceros</h4>
                        <span>Fundador</span>
                        <div class="tt-social">
                            <a href="https://github.com/AcerosDavid"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-4 text-center">
                <div class="ts-item set-bg" data-setbg="img/team/isaac.jpg">
                    <div class="ts_text">
                        <h4>Isaac Diaz</h4>
                        <span>El Fundador</span>
                        <div class="tt-social">
                            <a href="https://github.com/isaacDiazR"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Team Section End -->

@endsection