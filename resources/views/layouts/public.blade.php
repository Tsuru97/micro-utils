<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-sidebar-image="none" data-theme="default" data-theme-colors="default">
<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'MicroUtils')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', __('landing.hero_subtitle'))" />
    <meta name="keywords" content="@yield('meta_keywords', 'herramientas, utilidades web, microutils')" />

    <!-- Localized Alternate Links -->
    <link rel="alternate" hreflang="en" href="{{ request()->fullUrlWithQuery(['lang' => 'en']) }}" />
    <link rel="alternate" hreflang="es" href="{{ request()->fullUrlWithQuery(['lang' => 'es']) }}" />
    <link rel="alternate" hreflang="x-default" href="{{ url(request()->getPathInfo()) }}" />

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ request()->has('lang') ? request()->fullUrlWithQuery(['lang' => request()->get('lang')]) : url(request()->getPathInfo()) }}" />

    <!-- Open Graph / Facebook / WhatsApp -->
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('title', 'MicroUtils')" />
    <meta property="og:description" content="@yield('meta_description', __('landing.hero_subtitle'))" />
    <meta property="og:url" content="{{ request()->fullUrl() }}" />
    <meta property="og:image" content="{{ URL::asset('build/images/favicon.png') }}" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary" />
    <meta property="twitter:title" content="@yield('title', 'MicroUtils')" />
    <meta property="twitter:description" content="@yield('meta_description', __('landing.hero_subtitle'))" />
    <meta property="twitter:image" content="{{ URL::asset('build/images/favicon.png') }}" />

    <!-- Structured Data (Schema.org JSON-LD) -->
    @yield('structured_data')

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('build/images/favicon.png') }}">

    <!-- Google ADsense -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6359770213847968"
     crossorigin="anonymous"></script>

    <script async src="https://fundingchoicesmessages.google.com/i/pub-6359770213847968?ers=1"></script>
    <script>(function() {function signalGooglefcPresent() {if (!window.frames['googlefcPresent']) {if (document.body) {const iframe = document.createElement('iframe'); iframe.style = 'width: 0; height: 0; border: none; z-index: -1000; left: -1000px; top: -1000px;'; iframe.style.display = 'none'; iframe.name = 'googlefcPresent'; document.body.appendChild(iframe);} else {setTimeout(signalGooglefcPresent, 0);}}}signalGooglefcPresent();})();</script>

    @include('layouts.head-css')
    @yield('css')

    <style>
        /* Banner Hero Global */
        .main-hero {
            padding-top: 150px;
            padding-bottom: 100px;
            background-image: url('/build/images/hero-image-mobile.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        @media (min-width: 768px) {
            .main-hero {
                background-image: url('/build/images/hero-image-desktop.png');
            }
        }

        /* Ajuste para que la navbar sea transparente en móviles antes de hacer scroll */
        @media (max-width: 991.98px) {
            .navbar-landing:not(.is-sticky) {
                background-color: transparent !important;
            }
            .navbar-landing:not(.is-sticky) .navbar-toggler {
                color: #fff !important;
            }
            /* El menú desplegable debe tener fondo para que se pueda leer */
            .navbar-landing:not(.is-sticky) .navbar-collapse {
                background-color: #212529 !important; /* Fondo oscuro para contrastar con el texto blanco */
                border-radius: 8px;
                padding: 10px;
                margin-top: 10px;
                box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            }
            .navbar-landing:not(.is-sticky) .navbar-brand .card-logo-dark {
                display: none !important;
            }
            .navbar-landing:not(.is-sticky) .navbar-brand .card-logo-light {
                display: block !important;
            }
            /* Ajuste para el ícono de idioma */
            .navbar-landing:not(.is-sticky) #languageDropdown i {
                color: #fff !important;
            }
        }
    </style>
</head>

<body data-bs-spy="scroll" data-bs-target="#navbar-example">

    <!-- Begin page -->
    <div class="layout-wrapper landing">
        <nav class="navbar navbar-expand-lg navbar-landing navbar-light fixed-top" id="navbar">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{URL::asset('build/images/Logo-light.png')}}" class="card-logo card-logo-dark" alt="logo dark" height="30">
                    <img src="{{URL::asset('build/images/Logo-dark.png')}}" class="card-logo card-logo-light" alt="logo light" height="30">
                </a>
                <button class="navbar-toggler py-0 fs-20 text-body" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="mdi mdi-menu"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mt-2 mt-lg-0" id="navbar-example">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ request()->routeIs('home') ? '#hero' : route('home') . '#hero' }}">@lang('landing.home_hub')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ request()->routeIs('home') ? '#categories' : route('home') . '#categories' }}">@lang('landing.categories')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">{{ app()->getLocale() == 'es' ? 'Quiénes Somos' : 'About Us' }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">@lang('landing.contact_us')</a>
                        </li>
                    </ul>

                    <div class="d-flex align-items-center">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown me-3">
                                <a href="#" class="nav-link" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="padding-top: 0.5rem; padding-bottom: 0.5rem;">
                                    <i class="bx bx-world fs-22 align-middle"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
                                    <li><a class="dropdown-item" href="{{ route('lang', 'en') }}">English</a></li>
                                    <li><a class="dropdown-item" href="{{ route('lang', 'es') }}">Español</a></li>
                                </ul>
                            </li>
                        </ul>
                        {{-- No válido por ahora --}}
                        {{-- <a href="{{ route('login') }}" class="btn btn-primary text-white">Login</a> --}}
                    </div>
                </div>

            </div>
        </nav>
        <!-- end navbar -->
        @yield('content')


        <!-- start footer -->
        <footer class="custom-footer bg-dark py-5 position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mt-4">
                        <div>
                            <div>
                                <img src="{{ URL::asset('build/images/Logo-dark.png') }}" alt="logo light" height="30">
                            </div>
                            <div class="mt-4 fs-13">
                                <p>@lang('landing.footer_about_desc')</p>
                                <ul class="list-inline mb-0 footer-social-link">
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="avatar-xs d-block">
                                            <div class="avatar-title rounded-circle">
                                                <i class="ri-facebook-fill"></i>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="avatar-xs d-block">
                                            <div class="avatar-title rounded-circle">
                                                <i class="ri-github-fill"></i>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 ms-lg-auto">
                        <div class="row">
                            <div class="col-sm-4 mt-4">
                                <h5 class="text-white mb-0">@lang('landing.footer_legal')</h5>
                                <div class="text-muted mt-3">
                                    <ul class="list-unstyled ff-secondary footer-list">
                                        <li><a href="{{ route('privacy') }}">@lang('landing.privacy_policy')</a></li>
                                        <li><a href="{{ route('terms') }}">@lang('landing.terms_of_service')</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-4">
                                <h5 class="text-white mb-0">MicroUtils</h5>
                                <div class="text-muted mt-3">
                                    <ul class="list-unstyled ff-secondary footer-list">
                                        <li><a href="{{ request()->routeIs('home') ? '#hero' : route('home') . '#hero' }}">@lang('landing.home_hub')</a></li>
                                        <li><a href="{{ route('about') }}">{{ app()->getLocale() == 'es' ? 'Quiénes Somos' : 'About Us' }}</a></li>
                                        <li><a href="{{ route('contact') }}">@lang('landing.contact_us')</a></li>
                                        <li><a href="{{ request()->routeIs('home') ? '#faq' : route('home') . '#faq' }}">@lang('landing.faq_title')</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row text-center text-sm-start align-items-center mt-5">
                    <div class="col-sm-6">
                        <div>
                            <p class="copy-rights mb-0">
                                <script> document.write(new Date().getFullYear()) </script> © MicroUtils.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end footer -->

    </div>
    <!-- end layout wrapper -->

    @include('layouts.vendor-scripts')
    <script src="{{ URL::asset('build/js/pages/landing.init.js') }}"></script>
    @yield('script')
</body>
</html>

