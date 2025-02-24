@extends('layouts.site')

@section('content')
@include('components.paginate')
@include('components.page-header')

<!-- Services Details Start -->
<section class="services-details">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-5 wow fadeInUp animated" data-wow-delay="300ms">
                <div class="services-details__sidebar">
                    <div class="services-details__services-list">
                        @foreach ($service as $item)
                            <ul class="services-details__services list-unstyled">
                                <li>
                                    <a href="{{ route('service-detail', ['id' => $item->id]) }}">{{ $item->title }}</a>
                                </li>
                            </ul>
                        @endforeach
                    </div><!-- /.service-widget -->
                    
                    <div class="services-details__banner">
                        <div class="services-details__banner__shape"></div>
                        <div class="services-details__banner__image">
                            <img src="{{ asset('assets/images/resources/girl.svg') }}" alt="ogency">
                        </div>
                        <div class="services-details__banner__icon"><span class="icon-mobile-development"></span></div>
                        <h3 class="services-details__banner__title">
                            Web sitesi istiyorsun<br> nereden başlayacağını mı bilmiyorsun?
                        </h3>
                        <a class="ogency-btn" href="mailto:{{ $settings->site_email }}">Bize Ulaşın</a>
                    </div><!-- /.service-widget -->

                    <div class="services-details__document">
                        <div class="services-details__document__icon"><span class="icon-pdf-file"></span></div>
                        <h3 class="services-details__document__title">
                            <a href="#">Project Agreement Form</a>
                        </h3>
                        <p class="services-details__document__text">3.9KB</p>
                    </div><!-- /.service-widget -->
                </div><!-- /.service-sidebar -->
            </div><!-- /.column -->

            <div class="col-xl-8 col-lg-7 wow fadeInUp animated" data-wow-delay="400ms">
                <div class="services-details__content">
                    @if ($services->image)
                        <div class="services-details__thumb">
                            <img src="{{ asset('uploads/'.$services->image) }}"  loading="lazy" alt="{{ $services->title }}">
                        </div>
                    @endif
                    <div class="">
                           <h3>{{ $services->title }}</h3> 
                        </div>
                    {!! $services->content !!}
                </div>
            </div>
        </div>
        <!-- Sayfalama Butonları -->
<div class="pagination-wrapper mt-5 mb-2">
    {{ $service->links() }}
</div>
    </div>
</section>
<!-- Services Details End -->

@endsection
