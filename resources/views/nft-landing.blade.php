@extends('layouts.public')

@section('structured_data')
<script type="application/ld+json">
[
  {
    "@context": "https://schema.org",
    "@type": "WebSite",
    "name": "MicroUtils",
    "alternateName": ["Micro-Utils", "Micro Utils Hub"],
    "url": "{{ url('/') }}",
    "potentialAction": {
      "@type": "SearchAction",
      "target": {
        "@type": "EntryPoint",
        "urlTemplate": "{{ url('/') }}/api/search?q={search_term_string}"
      },
      "query-input": "required name=search_term_string"
    }
  },
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      {
        "@type": "Question",
        "name": {!! json_encode(__('landing.faq_1_question')) !!},
        "acceptedAnswer": {
          "@type": "Answer",
          "text": {!! json_encode(strip_tags(__('landing.faq_1_answer'))) !!}
        }
      },
      {
        "@type": "Question",
        "name": {!! json_encode(__('landing.faq_2_question')) !!},
        "acceptedAnswer": {
          "@type": "Answer",
          "text": {!! json_encode(strip_tags(__('landing.faq_2_answer'))) !!}
        }
      },
      {
        "@type": "Question",
        "name": {!! json_encode(__('landing.faq_3_question')) !!},
        "acceptedAnswer": {
          "@type": "Answer",
          "text": {!! json_encode(strip_tags(__('landing.faq_3_answer'))) !!}
        }
      },
      {
        "@type": "Question",
        "name": {!! json_encode(__('landing.faq_4_question')) !!},
        "acceptedAnswer": {
          "@type": "Answer",
          "text": {!! json_encode(strip_tags(__('landing.faq_4_answer'))) !!}
        }
      }
    ]
  }
]
</script>
@endsection

@section('title') @lang('landing.home_hub') @endsection

@section('css')
<style>
    .search-box .form-control {
        padding: 1.5rem;
        font-size: 1.2rem;
        border-radius: 50px;
        border: 2px solid #4F46E5;
    }
    .search-box .btn-search {
        position: absolute;
        right: 10px;
        top: 10px;
        bottom: 10px;
        border-radius: 40px;
        padding: 0 30px;
        font-weight: bold;
    }
</style>
@endsection

@section('content')

        <!-- start hero section -->
        <section class="section main-hero" id="hero">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-sm-10">
                        <div class="text-center">
                            <h1 class="display-4 fw-bold mb-4 lh-base text-white">@lang('landing.hero_title')</h1>
                            <p class="lead text-white-50 lh-base mb-5 pb-2">@lang('landing.hero_subtitle')</p>

                            <!-- Búsqueda Principal -->
                            <div class="search-box position-relative z-3">
                                <input type="text" class="form-control" id="search-tools" placeholder="@lang('landing.search_placeholder')" autocomplete="off">
                                <button class="btn btn-success text-white btn-search">@lang('landing.search_button')</button>
                            </div>
                            
                            <!-- Contenedor de Resultados (Scout/TNTSearch) -->
                            <div id="search-results" class="mt-2 text-start d-none position-absolute w-100 z-3">
                                <div class="card shadow-lg border-0 rounded-3 overflow-hidden">
                                    <div class="card-body p-0" id="results-container">
                                        <!-- Resultados inyectados por JS -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end hero section -->

        <!-- start categories -->
        <section class="section bg-light" id="categories">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="text-center mb-5">
                            <h2 class="mb-3 fw-semibold lh-base text-primary">@lang('landing.all_categories')</h2>
                        </div>
                    </div>
                </div>
                <div class="row" id="categories-grid">
                    <!-- Las categorías se cargarán aquí desde la base de datos a través de Blade -->
                    @if(isset($categories) && $categories->count() > 0)
                        @foreach($categories as $category)
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="card text-center border shadow-none material-shadow h-100">
                                    <div class="card-body py-4 px-4">
                                        <i class="{{ $category->icon ?? 'ri-tools-fill' }} fs-1 text-success mb-3 d-inline-block"></i>
                                        <h5 class="text-primary">{{ $category->name }}</h5>
                                        <p class="text-muted pb-1">@lang('landing.tools_count', ['count' => $category->tools->count() ?? 0])</p>
                                        <a href="{{ route('category.show', $category->slug) }}" class="btn btn-info w-100">@lang('landing.explore_tools')</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 text-center text-muted">
                            <p>No categories found. Run seeders.</p>
                        </div>
                    @endif
                </div>
            </div>
        </section>
        <!-- end categories -->

        <!-- start Work Process -->
        <section class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="text-center mb-5">
                            <h3 class="mb-3 fw-semibold">@lang('landing.how_it_works')</h3>
                            <p class="text-muted mb-4 ff-secondary">@lang('landing.how_it_works_subtitle')</p>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row text-center">
                    <div class="col-lg-4">
                        <div class="process-card mt-4">
                            <div class="process-arrow-img d-none d-lg-block">
                                <img src="{{ URL::asset('build/images/landing/process-arrow-img.png') }}"
                                    alt="" class="img-fluid">
                            </div>
                            <div class="avatar-sm icon-effect mx-auto mb-4">
                                <div class="avatar-title bg-transparent text-success rounded-circle h1">
                                    <i class="ri-search-eye-line"></i>
                                </div>
                            </div>

                            <h5>@lang('landing.step_1_title')</h5>
                            <p class="text-muted ff-secondary">@lang('landing.step_1_desc')</p>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-4">
                        <div class="process-card mt-4">
                            <div class="process-arrow-img d-none d-lg-block">
                                <img src="{{ URL::asset('build/images/landing/process-arrow-img.png') }}"
                                    alt="" class="img-fluid">
                            </div>
                            <div class="avatar-sm icon-effect mx-auto mb-4">
                                <div class="avatar-title bg-transparent text-success rounded-circle h1">
                                    <i class="ri-file-edit-line"></i>
                                </div>
                            </div>

                            <h5>@lang('landing.step_2_title')</h5>
                            <p class="text-muted ff-secondary">@lang('landing.step_2_desc')</p>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-4">
                        <div class="process-card mt-4">
                            <div class="avatar-sm icon-effect mx-auto mb-4">
                                <div class="avatar-title bg-transparent text-success rounded-circle h1">
                                    <i class="ri-rocket-line"></i>
                                </div>
                            </div>

                            <h5>@lang('landing.step_3_title')</h5>
                            <p class="text-muted ff-secondary">@lang('landing.step_3_desc')</p>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- end Work Process -->

        <!-- start faqs -->
        <section class="section bg-light" id="faq">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="text-center mb-5">
                            <h3 class="mb-3 fw-semibold">@lang('landing.faq_title')</h3>
                            <p class="text-muted mb-4 ff-secondary">@lang('landing.faq_subtitle')</p>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row g-lg-5 g-4 justify-content-center">
                    <div class="col-lg-8">
                        <div class="accordion custom-accordionwithicon custom-accordion-border accordion-border-box"
                            id="genques-accordion">
                            
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="genques-headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#genques-collapseOne" aria-expanded="true"
                                        aria-controls="genques-collapseOne">
                                        @lang('landing.faq_1_question')
                                    </button>
                                </h2>
                                <div id="genques-collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="genques-headingOne" data-bs-parent="#genques-accordion">
                                    <div class="accordion-body ff-secondary">
                                        @lang('landing.faq_1_answer')
                                    </div>
                                </div>
                            </div>
                            
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="genques-headingTwo">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#genques-collapseTwo"
                                        aria-expanded="false" aria-controls="genques-collapseTwo">
                                        @lang('landing.faq_2_question')
                                    </button>
                                </h2>
                                <div id="genques-collapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="genques-headingTwo" data-bs-parent="#genques-accordion">
                                    <div class="accordion-body ff-secondary">
                                        @lang('landing.faq_2_answer')
                                    </div>
                                </div>
                            </div>
                            
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="genques-headingThree">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#genques-collapseThree"
                                        aria-expanded="false" aria-controls="genques-collapseThree">
                                        @lang('landing.faq_3_question')
                                    </button>
                                </h2>
                                <div id="genques-collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="genques-headingThree" data-bs-parent="#genques-accordion">
                                    <div class="accordion-body ff-secondary">
                                        @lang('landing.faq_3_answer')
                                    </div>
                                </div>
                            </div>
                            
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="genques-headingFour">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#genques-collapseFour"
                                        aria-expanded="false" aria-controls="genques-collapseFour">
                                        @lang('landing.faq_4_question')
                                    </button>
                                </h2>
                                <div id="genques-collapseFour" class="accordion-collapse collapse"
                                    aria-labelledby="genques-headingFour" data-bs-parent="#genques-accordion">
                                    <div class="accordion-body ff-secondary">
                                        @lang('landing.faq_4_answer')
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <!--end accordion-->
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- end faqs -->

@endsection

@section('script')
<script>
document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById('search-tools');
    const resultsContainerBox = document.getElementById('search-results');
    const resultsContainer = document.getElementById('results-container');
    let debounceTimer;

    searchInput.addEventListener('input', function() {
        clearTimeout(debounceTimer);
        const query = searchInput.value.trim();
        
        if (query.length < 2) {
            resultsContainerBox.classList.add('d-none');
            return;
        }

        debounceTimer = setTimeout(() => {
            fetch(`/api/search?q=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    resultsContainer.innerHTML = '';
                    if (data.length > 0) {
                        data.forEach(tool => {
                            let item = document.createElement('a');
                            item.href = tool.url;
                            item.className = 'list-group-item list-group-item-action border-0 border-bottom py-3 px-4';
                            item.innerHTML = `
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="avatar-sm">
                                            <div class="avatar-title bg-soft-primary text-primary rounded-circle fs-18">
                                                <i class="ri-tools-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1 text-dark fw-semibold">${tool.name}</h6>
                                        <p class="text-muted mb-0 fs-12">${tool.description}</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <span class="badge badge-soft-success">${tool.category}</span>
                                    </div>
                                </div>
                            `;
                            resultsContainer.appendChild(item);
                        });
                        
                        // Add class to container to make it a list group
                        resultsContainer.className = 'list-group list-group-flush';
                        resultsContainerBox.classList.remove('d-none');
                    } else {
                        resultsContainer.innerHTML = `
                            <div class="text-center py-4 text-muted">
                                <i class="ri-search-line fs-1 mb-2 d-inline-block"></i>
                                <h6>No se encontraron herramientas.</h6>
                            </div>
                        `;
                        resultsContainerBox.classList.remove('d-none');
                    }
                })
                .catch(error => console.error('Error fetching search results:', error));
        }, 300);
    });

    // Cierra los resultados al hacer clic fuera
    document.addEventListener('click', function(e) {
        if (!searchInput.contains(e.target) && !resultsContainerBox.contains(e.target)) {
            resultsContainerBox.classList.add('d-none');
        }
    });
});
</script>
@endsection

