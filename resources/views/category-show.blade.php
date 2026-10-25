@extends('layouts.public')

@section('structured_data')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "{{ app()->getLocale() == 'es' ? 'Inicio' : 'Home' }}",
      "item": "{{ url('/') }}"
    },
    {
      "@type": "ListItem",
      "position": 2,
      "name": "{{ $category->name }}",
      "item": "{{ route('category.show', $category->slug) }}"
    }
  ]
}
</script>
@endsection

@section('title') {{ $category->name }} - MicroUtils @endsection

@section('css')
<style>
    .tool-card {
        transition: all 0.3s ease;
    }
    
    .tool-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.08) !important;
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
                        <i class="{{ $category->icon ?? 'ri-tools-fill' }} display-4 text-white mb-3 d-inline-block"></i>
                        <h1 class="display-5 fw-bold mb-3 lh-base text-white">{{ $category->name }}</h1>
                        <p class="lead text-white-50 lh-base mb-0">@lang('landing.tools_count', ['count' => $category->tools->count() ?? 0])</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end hero section -->

    <!-- start tools -->
    <section class="section">
        <div class="container">
            <div class="row">
                @if($category->tools->count() > 0)
                    @foreach($category->tools as $tool)
                        <div class="col-xl-3 col-md-4 col-sm-6 mb-4">
                            <div class="card tool-card h-100 border shadow-none material-shadow">
                                <div class="card-body text-center d-flex flex-column">
                                    <div class="avatar-md mx-auto mb-3">
                                        <div class="avatar-title bg-info-subtle text-info rounded-circle fs-24">
                                            <i class="ri-settings-5-line"></i>
                                        </div>
                                    </div>
                                    <h5 class="mb-2 fs-16">
                                        <a href="{{ route('tool.show', $tool->slug) }}" class="text-dark">{{ $tool->name }}</a>
                                    </h5>
                                    <p class="text-muted fs-13 flex-grow-1">
                                        {{ Str::limit(strip_tags($tool->description), 100) }}
                                    </p>
                                    <div class="mt-3">
                                        <a href="{{ route('tool.show', $tool->slug) }}" class="btn btn-soft-success w-100">
                                            @lang('landing.explore_tools') <i class="ri-arrow-right-line align-bottom"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center text-muted py-5">
                        <i class="ri-search-line display-4 text-muted mb-3 d-inline-block"></i>
                        <h5>@lang('landing.no_tools_found')</h5>
                        <p>@lang('landing.adding_more_tools')</p>
                    </div>
                @endif
            </div>
            <!--end row-->
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <a href="{{ url('/') }}" class="btn btn-outline-primary"><i class="ri-arrow-left-line align-bottom me-1"></i> @lang('landing.back_to_hub')</a>
                </div>
            </div>
        </div>
    </section>
    <!-- end tools -->

@endsection

@section('script')
    <script src="{{ URL::asset('build/js/pages/landing.init.js') }}"></script>
@endsection

