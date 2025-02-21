@extends('layouts.site')

@section('content')
    @include('components.paginate')

    <div class="stricky-header stricked-menu main-menu">
        <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
    </div><!-- /.stricky-header -->
    <section class="page-header">
        <div class="page-header__bg">
        </div>
        <!-- /.page-header__bg -->
        <div class="page-header__overlay"></div>
        <!-- /.page-header__bg -->
        <div class="container">
            <ul class="page-header__breadcrumb list-unstyled">
                <li><a href="index.html">Anasayfa</a></li>
                <li><span>{{ $page_title }}</span></li>
            </ul><!-- /.page-breadcrumb list-unstyled -->
            <h2 class="page-header__title">{{ $page_title }}</h2><!-- /.page-title -->
        </div><!-- /.container -->
    </section><!-- /.page-header -->

    <!-- Service Start -->
    <section class="service-one @@extraClassName" id="hizmetlerimiz">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h5 class="section-title__tagline section-title__tagline--has-dots">Sizin için çabalıyoruz.</h5>
                        <h2 class="section-title__title">Müşterilerimize <br> sunduğumuz hizmetlerimiz</h2>
                    </div><!-- section-title -->
                </div>
            </div>




            @php
    use Illuminate\Support\Str;
@endphp

<div class="row">
    @foreach ($services as $item)
        <div class="col-lg-3 col-md-3 wow fadeInUp animated" data-wow-delay="100ms">
            <div class="service-one__item">
                <!-- Servis İkonu -->
                <div class="service-one__item__icon">
                    @if(!empty($item->icon))
                        <span class="{{ $item->icon }}"></span>
                    @endif
                </div>

                <!-- Servis Başlığı -->
                <h3 class="service-one__item__title">
                    <a href="{{ route('service-detail', ['id' => $item->id]) }}">{!! $item->title !!}</a>
                </h3>

                <!-- Servis Açıklaması -->
                <p class="service-one__item__text">
                    {!! Str::limit(strip_tags($item->content), 60) !!}
                </p>

                <!-- Daha Fazlası Butonu -->
                <a class="service-one__item__btn" href="{{ route('service-detail', ['id' => $item->id]) }}">
                    Daha Fazlası <span class="icon-down-right"></span>
                </a>
            </div>
        </div>
    @endforeach
</div>

            <!-- Sayfalama Butonları -->
            <div class="pagination-wrapper mt-5 mb-2">
                {{ $services->links() }}
            </div>

        </div>
    </section>
    <!-- Service Start -->
@endsection
