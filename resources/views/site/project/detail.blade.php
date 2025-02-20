@extends('layouts.site')
@section('content')

<div class="stricky-header stricked-menu main-menu">
    <div class="sticky-header__content"></div>
</div>

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

<!-- Projects Details Start -->
<section class="project-details">
    <div class="container">
        @if ($portfolio->getMedia('portfolio_images')->isNotEmpty())
            @foreach ($portfolio->getMedia('portfolio_images') as $image)
                <div class="project-details__image wow fadeInUp animated" data-wow-delay="200ms">
                      
                                <img src="{{ asset('uploads/' . $image->id . '/' . $image->file_name) }}"
                                    alt="Portfolio Image">
                           
                </div>
            @endforeach
        @endif

        <div class="row">
            <div class="col-xl-8 col-lg-7 wow fadeInLeft animated" data-wow-delay="300ms">
                <div class="project-details__content">
                    <h3 class="project-details__content__title">{{ $portfolio->title ?? 'Başlık' }}</h3>
                    {!! $portfolio->content ?? 'İçerik mevcut değil.' !!}
                </div>
            </div>
        </div>

        <div class="project-details__pagination wow fadeInUp animated" data-wow-delay="400ms">
            @if (!empty($previousPortfolio))
                <a class="project-details__pagination__previous" href="{{ route('project-detail', ['id' => $previousPortfolio->id]) }}">
                    <span class="icon-left-arrow"></span>Previous
                </a>
            @endif

            @if (!empty($nextPortfolio))
                <a class="project-details__pagination__next" href="{{ route('project-detail', ['id' => $nextPortfolio->id]) }}">
                    Next<span class="icon-right-arrow"></span>
                </a>
            @endif
        </div>

        <div class="section-title text-center wow fadeInUp animated" data-wow-delay="400ms">
            <h5 class="section-title__tagline section-title__tagline--has-dots">Projelerimiz</h5>
            <h2 class="section-title__title">Beğeneceğinizi düşündüğümüz<br> Diğer Projelerimiz</h2>
        </div>

        <div class="row">
            @foreach ($portfolios as $item)
                <div class="col-lg-4 col-md-6 wow fadeInUp animated" data-wow-delay="200ms">
                    <div class="project-two__item">
                        <div class="project-two__item__image">
                              @foreach ($item->getMedia('portfolio_images') as $image)
                                <img src="{{ asset('uploads/' . $image->id . '/' . $image->file_name) }}"
                                    alt="Portfolio Image">
                            @endforeach
                        </div>

                       

                        <div class="project-two__item__content">
                            <p class="project-two__item__content__cats">
                                <a href="test</a>
                            </p>
                            <h3 class="project-two__item__content__title">
                                <a href="{{ route('project-detail', ['id' => $item->id]) }}">{{ $item->title }}</a>
                            </h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Projects Details End -->
@endsection
