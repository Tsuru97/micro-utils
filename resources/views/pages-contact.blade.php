@extends('layouts.public')
@section('title', app()->getLocale() == 'es' ? 'Contacto - MicroUtils' : 'Contact Us - MicroUtils')
@section('content')

    <!-- start hero section -->
    <section class="section main-hero" id="contact-hero">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-10">
                    <div class="text-center">
                        <i class="ri-mail-send-line display-4 text-white mb-3 d-inline-block"></i>
                        <h1 class="display-5 fw-bold mb-3 lh-base text-white">{{ app()->getLocale() == 'es' ? 'Contáctanos' : 'Contact Us' }}</h1>
                        <p class="lead text-white-50 lh-base mb-0">
                            {{ app()->getLocale() == 'es' ? '¿Tienes dudas, sugerencias o reporte de errores? Escríbenos directamente.' : 'Have any questions, suggestions, or bug reports? Reach out to us.' }}
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
                            <div class="row">
                                <!-- Form Column -->
                                <div class="col-md-7 border-end pe-md-4 mb-4 mb-md-0">
                                    @if(session('success'))
                                        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                                            <i class="ri-checkbox-circle-line label-icon align-middle fs-16 me-2"></i>
                                            <strong>{{ session('message') }}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif

                                    @if($errors->any())
                                        <div class="alert alert-danger shadow-sm">
                                            <ul class="mb-0">
                                                @foreach($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form action="{{ route('contact.submit') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label fw-semibold">{{ app()->getLocale() == 'es' ? 'Nombre Completo' : 'Full Name' }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="{{ app()->getLocale() == 'es' ? 'Ej. Juan Pérez' : 'e.g. John Doe' }}" required>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label fw-semibold">{{ app()->getLocale() == 'es' ? 'Correo Electrónico' : 'Email Address' }} <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="{{ app()->getLocale() == 'es' ? 'Ej. juan@ejemplo.com' : 'e.g. john@example.com' }}" required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="subject" class="form-label fw-semibold">{{ app()->getLocale() == 'es' ? 'Asunto' : 'Subject' }} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" value="{{ old('subject') }}" placeholder="{{ app()->getLocale() == 'es' ? 'Ej. Sugerencia de herramienta' : 'e.g. Tool suggestion' }}" required>
                                            @error('subject')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="message" class="form-label fw-semibold">{{ app()->getLocale() == 'es' ? 'Mensaje' : 'Message' }} <span class="text-danger">*</span></label>
                                            <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="5" placeholder="{{ app()->getLocale() == 'es' ? 'Escribe aquí tu mensaje en detalle...' : 'Write your detailed message here...' }}" required>{{ old('message') }}</textarea>
                                            @error('message')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="text-end">
                                            <button type="submit" class="btn btn-success text-white w-100 py-2 fs-15 fw-bold">
                                                <i class="ri-send-plane-fill align-middle me-2"></i>{{ app()->getLocale() == 'es' ? 'Enviar Mensaje' : 'Send Message' }}
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <!-- Sidebar Details Column -->
                                <div class="col-md-5 ps-md-4">
                                    <h5 class="text-primary mb-3">{{ app()->getLocale() == 'es' ? 'Información de Contacto' : 'Contact Info' }}</h5>
                                    
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="avatar-sm flex-shrink-0">
                                            <div class="avatar-title bg-info-subtle text-info rounded-circle fs-18">
                                                <i class="ri-mail-line"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-0 fw-semibold">{{ app()->getLocale() == 'es' ? 'Email Principal' : 'Support Email' }}</h6>
                                            <a href="mailto:support@micro-utils.com" class="text-muted fs-14">support@micro-utils.com</a>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center mb-3">
                                        <div class="avatar-sm flex-shrink-0">
                                            <div class="avatar-title bg-info-subtle text-info rounded-circle fs-18">
                                                <i class="ri-map-pin-line"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-0 fw-semibold">{{ app()->getLocale() == 'es' ? 'Ubicación' : 'Location' }}</h6>
                                            <p class="text-muted mb-0 fs-14">San Francisco, CA, USA</p>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center mb-4">
                                        <div class="avatar-sm flex-shrink-0">
                                            <div class="avatar-title bg-info-subtle text-info rounded-circle fs-18">
                                                <i class="ri-time-line"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-0 fw-semibold">{{ app()->getLocale() == 'es' ? 'Tiempo de Respuesta' : 'Response Time' }}</h6>
                                            <p class="text-muted mb-0 fs-14">{{ app()->getLocale() == 'es' ? 'Generalmente respondemos en menos de 24 horas laborables.' : 'We usually respond within 24 working hours.' }}</p>
                                        </div>
                                    </div>

                                    <hr class="my-4">

                                    <h5 class="text-primary mb-3">{{ app()->getLocale() == 'es' ? 'Preguntas Frecuentes' : 'FAQ Help' }}</h5>
                                    <p class="text-muted fs-13">
                                        {{ app()->getLocale() == 'es' ? '¿Tienes dudas rápidas? Revisa nuestra sección de preguntas frecuentes en la página de inicio para obtener ayuda inmediata sobre privacidad de archivos y seguridad.' : 'Have quick questions? Check our FAQ section on the home page for instant help regarding file privacy and client-side processing security.' }}
                                    </p>
                                    <a href="{{ route('home') }}#faq" class="btn btn-sm btn-soft-info mt-1">{{ app()->getLocale() == 'es' ? 'Ver Preguntas Frecuentes' : 'View FAQ Section' }}</a>
                                </div>
                            </div>

                            <div class="text-start mt-4 border-top pt-3">
                                <a href="{{ route('home') }}" class="btn btn-outline-secondary"><i class="ri-arrow-left-line align-bottom me-1"></i> {{ app()->getLocale() == 'es' ? 'Volver al Inicio' : 'Back to Home' }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
        </div>
    </section>

@endsection
