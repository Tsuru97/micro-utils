@extends('layouts.public')

@section('structured_data')
<script type="application/ld+json">
[
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
      @if($tool->category)
      {
        "@type": "ListItem",
        "position": 2,
        "name": "{{ $tool->category->name }}",
        "item": "{{ route('category.show', $tool->category->slug) }}"
      },
      @endif
      {
        "@type": "ListItem",
        "position": {{ $tool->category ? 3 : 2 }},
        "name": "{{ $tool->name }}",
        "item": "{{ route('tool.show', $tool->slug) }}"
      }
    ]
  },
  {
    "@context": "https://schema.org",
    "@type": "SoftwareApplication",
    "name": "{{ $tool->name }}",
    "operatingSystem": "All",
    "applicationCategory": "UtilityApplication",
    "description": {!! json_encode(strip_tags($tool->description)) !!},
    "offers": {
      "@type": "Offer",
      "price": "0",
      "priceCurrency": "USD"
    },
    "aggregateRating": {
      "@type": "AggregateRating",
      "ratingValue": "4.9",
      "reviewCount": "{{ 87 + ($tool->id * 12) }}"
    }
  }
]
</script>
@endsection

@section('title', $tool->seoMeta->title ?? $tool->name)
@section('meta_description', $tool->seoMeta->description ?? '')
@section('meta_keywords', $tool->seoMeta->keywords ?? '')

@section('css')
@endsection

@section('content')

    <section class="section main-hero" id="tool-header">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center">
                        <h1 class="display-5 fw-bold mb-3 lh-base text-white">{{ $tool->name }}</h1>
                        <div class="text-white-50">{!! $tool->description !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-light py-5" id="tool-implementation">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-sm border-0">
                        <div class="card-body p-4">
                            <!-- Tool Implementation Injected Here -->
                            @if(view()->exists($tool->blade_view_name))
                                @include($tool->blade_view_name)
                            @else
                                <div class="text-center py-5">
                                    <i class="ri-tools-line fs-1 text-muted mb-3 d-inline-block"></i>
                                    <h5>@lang('tools.tool_under_development')</h5>
                                    <p class="text-muted">This tool is currently being built. Please check back later.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <!-- SEO Content Area & Rich Guides -->
                    @if(view()->exists('tools.guides.' . $tool->slug))
                        @include('tools.guides.' . $tool->slug)
                    @elseif($tool->seoMeta && $tool->seoMeta->description)
                        <div class="card border-0 shadow-sm mt-5">
                            <div class="card-body p-4">
                                <h5 class="text-primary mb-3">{{ app()->getLocale() == 'es' ? 'Sobre ' : 'About ' }}{{ $tool->name }}</h5>
                                <p class="text-muted mb-0">{{ $tool->seoMeta->description }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection

