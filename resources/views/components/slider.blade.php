

<!-- Main Slider Start -->
<section class="main-slider" id="anasayfa">
    <div class="main-slider__one ogency-owl__carousel owl-carousel"
        data-owl-options='{
            "loop": true,
            "animateOut": "fadeOut",
            "animateIn": "fadeIn",
            "items": 1,
            "autoplay": 6000,
            "autoplayTimeout": 7000,
            "smartSpeed": 500,
            "nav": false,
            "dots": false,
            "margin": 0
        }'>

        @foreach ($sliders as $item)
            <div class="item">
                <!-- slider item start -->
                <div class="main-slider__one-item">
                    <!-- bg image start -->
                    <div class="main-slider__one-bg" style="background-image: url('{{ asset('assets/images/backgrounds/slider-1-bg-1.webp') }}');"></div>
                    <!-- bg image end -->

                    <div class="main-slider__one-item__shape-2">
                        <img src="{{ asset('uploads/' . $item->image) }}" loading="lazy" alt="">
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="main-slider__one-item__content">
                                    <h2>{!! $item->title1 ?? '' !!}</h2>
                                    <a href="{{ route('site.contact') }}" class="main-slider__one-item__content-curved-circle-box">
                                        <div class="curved-circle">
                                            <span class="curved-circle--item">
                                                &emsp;&emsp;{!! $item->title2 ?? '' !!} &emsp;&emsp;
                                            </span>
                                        </div>
                                        <div class="main-slider__one-item__content-arrow-down">
                                            <span class="icon-down-right"></span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- slider item end -->
            </div>
        @endforeach

    </div>

    @include('components.social')

    <!-- Phone Start -->
    <div class="main-slider__phone">
        @if (!empty($settings?->site_phone))
            <a href="tel:+{{ $settings->site_phone }}">
                +{{ $settings->site_phone }}
            </a>
        @endif
    </div>
    <!-- Phone End -->
</section>
<!-- Main Slider End -->
