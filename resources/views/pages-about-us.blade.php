@extends('layouts.public')
@section('title', app()->getLocale() == 'es' ? 'Acerca de Nosotros - MicroUtils' : 'About Us - MicroUtils')
@section('content')

    <!-- start hero section -->
    <section class="section main-hero" id="about-hero">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-10">
                    <div class="text-center">
                        <i class="ri-information-line display-4 text-white mb-3 d-inline-block"></i>
                        <h1 class="display-5 fw-bold mb-3 lh-base text-white">{{ app()->getLocale() == 'es' ? 'Acerca de Nosotros' : 'About Us' }}</h1>
                        <p class="lead text-white-50 lh-base mb-0">
                            {{ app()->getLocale() == 'es' ? 'Nuestra filosofía, compromiso con la privacidad y pasión por las herramientas eficientes.' : 'Our philosophy, commitment to privacy, and passion for efficient tools.' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end hero section -->

    <section class="section bg-light py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            @if(app()->getLocale() == 'es')
                                <div class="mb-4">
                                    <h5 class="text-primary"><i class="ri-rocket-2-line align-middle me-2"></i>Nuestra Misión</h5>
                                    <p class="text-muted">En <strong>MicroUtils</strong>, nuestra misión es simplificar las tareas digitales diarias de desarrolladores, diseñadores, creadores de contenido y usuarios generales. Creemos que las herramientas útiles no deberían venir acompañadas de cookies invasivas, registros molestos ni tiempos de carga lentos. Queremos ser tu opción rápida, confiable y segura de cabecera.</p>
                                </div>

                                <hr class="my-4">

                                <div class="mb-4">
                                    <h5 class="text-primary"><i class="ri-shield-user-line align-middle me-2"></i>La Privacidad es lo Primero</h5>
                                    <p class="text-muted">La característica fundamental de MicroUtils es la <strong>seguridad del procesamiento en local</strong>. La mayoría de nuestras utilidades (tales como formateadores de texto, generadores de contraseñas y validadores de JSON) operan exclusivamente a través de JavaScript del lado del cliente. Esto significa que:</p>
                                    <ul class="text-muted list-unstyled ps-3">
                                        <li><i class="ri-checkbox-circle-line text-success me-2"></i>Tus contraseñas no se envían a ningún servidor de bases de datos.</li>
                                        <li><i class="ri-checkbox-circle-line text-success me-2"></i>Tus textos confidenciales y códigos JSON nunca son monitoreados o transferidos.</li>
                                        <li><i class="ri-checkbox-circle-line text-success me-2"></i>Todo el cómputo se hace directamente en el procesador de tu dispositivo para máxima seguridad y velocidad instantánea.</li>
                                    </ul>
                                </div>

                                <hr class="my-4">

                                <div class="mb-4">
                                    <h5 class="text-primary"><i class="ri-code-s-slash-line align-middle me-2"></i>Nuestra Tecnología</h5>
                                    <p class="text-muted">Estamos construidos bajo un ecosistema moderno utilizando <strong>Laravel</strong> para el manejo de rutas y contenido estructurado, y <strong>Vanilla JavaScript</strong> altamente optimizado para el motor de herramientas. Nos enfocamos en mantener el código ligero, limpio y libre de librerías innecesarias para asegurar cargas menores a un segundo, incluso en conexiones de red lentas.</p>
                                </div>

                                <hr class="my-4">

                                <div class="mb-4">
                                    <h5 class="text-primary"><i class="ri-heart-line align-middle me-2"></i>Apoyo y Comunidad</h5>
                                    <p class="text-muted">MicroUtils es y seguirá siendo 100% gratuito. Creemos en el acceso libre a herramientas de software esenciales. Si encuentras de utilidad nuestra plataforma, te invitamos a compartir el sitio con tus colegas, dejar tus sugerencias en nuestra sección de contacto o reportar cualquier error para seguir mejorando día a día.</p>
                                </div>
                            @else
                                <div class="mb-4">
                                    <h5 class="text-primary"><i class="ri-rocket-2-line align-middle me-2"></i>Our Mission</h5>
                                    <p class="text-muted">At <strong>MicroUtils</strong>, our mission is to simplify the daily digital tasks of developers, designers, content writers, and general internet users. We believe that useful tools shouldn't come with invasive tracking cookies, mandatory registrations, or bloated loading times. We strive to be your go-to fast, reliable, and secure utility hub.</p>
                                </div>

                                <hr class="my-4">

                                <div class="mb-4">
                                    <h5 class="text-primary"><i class="ri-shield-user-line align-middle me-2"></i>Privacy First Philosophy</h5>
                                    <p class="text-muted">The core feature of MicroUtils is <strong>client-side processing</strong>. Most of our utilities (such as text formatters, password generators, and JSON validators) run exclusively using client-side JavaScript. This means that:</p>
                                    <ul class="text-muted list-unstyled ps-3">
                                        <li><i class="ri-checkbox-circle-line text-success me-2"></i>Your secure passwords are never sent to any database or backend server.</li>
                                        <li><i class="ri-checkbox-circle-line text-success me-2"></i>Your confidential texts and JSON payloads are never logged or stored.</li>
                                        <li><i class="ri-checkbox-circle-line text-success me-2"></i>All processing occurs locally in your device's browser, providing top-tier security and instant speed.</li>
                                    </ul>
                                </div>

                                <hr class="my-4">

                                <div class="mb-4">
                                    <h5 class="text-primary"><i class="ri-code-s-slash-line align-middle me-2"></i>Our Tech Stack</h5>
                                    <p class="text-muted">Our platform is built on a modern stack using <strong>Laravel</strong> for route structure and translatable layouts, combined with pure, optimized <strong>Vanilla JavaScript</strong> engines. We prioritize light, clean code architectures with zero dependency bloat to guarantee sub-second page loads, even on mobile networks.</p>
                                </div>

                                <hr class="my-4">

                                <div class="mb-4">
                                    <h5 class="text-primary"><i class="ri-heart-line align-middle me-2"></i>Community Supported</h5>
                                    <p class="text-muted">MicroUtils is and will always remain 100% free. We believe in providing open, barrier-free access to fundamental software utilities. If you find our platform helpful, please share it with your coworkers, drop your suggestions in our contact section, or report bugs to help us improve.</p>
                                </div>
                            @endif

                            <div class="text-end hstack gap-2 justify-content-end mt-4">
                                <a href="{{ route('home') }}" class="btn btn-outline-secondary">{{ app()->getLocale() == 'es' ? 'Volver al Inicio' : 'Back to Home' }}</a>
                                <a href="{{ route('contact') }}" class="btn btn-primary">{{ app()->getLocale() == 'es' ? 'Contáctanos' : 'Contact Us' }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
        </div>
    </section>

@endsection
