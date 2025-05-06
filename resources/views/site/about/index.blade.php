@extends('layouts.site')

@section('content')

@include('components.page-header')

<!-- About Start -->
<section class="about-three">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-three__thumb">
                    <!-- about thumb start -->

                    @if (!empty($about?->image1))
                        <div class="about-three__thumb--two wow fadeInLeft animated" data-wow-delay="200ms">
                            <img src="{{ asset('uploads/' . $about->image1) }}" loading="lazy" alt="ogency">
                        </div>
                    @endif

                </div><!-- about thumb end -->
            </div>

            <div class="col-lg-6">
                <div class="about-three__content">
                    <!-- about content start -->
                    <div class="section-title">
                        @if (!empty($about?->title))
                            <h5 class="section-title__tagline section-title__tagline--has-dots">{!! $about->title !!}</h5>
                        @endif

                        @if (!empty($about?->content1))
                            <h3 class="section-title__title">{!! $about->content1 !!}</h3>
                        @endif
                    </div><!-- section-title -->

                    @if (!empty($about?->content2))
                        <p class="about-three__content__text">
                            {!! $about->content2 !!}
                        </p>
                    @endif

                </div><!-- about content end -->
            </div>
        </div>
    </div>
</section>
<!-- About End -->

@endsection
