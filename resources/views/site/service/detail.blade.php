@extends('layouts.site')

@section('content')
<div class="stricky-header stricked-menu main-menu">
    <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
</div><!-- /.stricky-header -->

<section class="page-header">
    <div class="page-header__bg"></div>
    <div class="page-header__overlay"></div>
    <div class="container">
        <ul class="page-header__breadcrumb list-unstyled">
            <li><a href="{{ route('site.index') }}">Anasayfa</a></li>
            <li><span>{{ $page_title }}</span></li>
        </ul>
        <h2 class="page-header__title">{{ $page_title }}</h2>
    </div>
</section>

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
                            <img src="{{ asset('uploads/'.$services->image) }}" alt="{{ $services->title }}">
                        </div>
                    @endif
                    {!! $services->content !!}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services Details End -->

@endsection
