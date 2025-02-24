<!--Main Slider Start-->
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
        <div class="item">
            <!-- slider item start -->
            <div class="main-slider__one-item">
                <!-- bg image start -->
                <div class="main-slider__one-bg"
                    style="background-image: url(assets/images/backgrounds/slider-1-bg-1.webp);"></div>
                <!-- bg image end -->
                <!-- image-layer start -->


                {{-- <div class="main-slider__one-item__shape-1">
               <img src="assets/images/backgrounds/slider-1-shape-1.jpg" alt="">
            </div> --}}

            
                @foreach ($sliders as $item)
                    <div class="main-slider__one-item__shape-2">
                        <img src="{{ asset('uploads/' . $item->image) }}"  loading="lazy" alt="">
                    </div>
                @endforeach

                <!-- image-layer end -->
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="main-slider__one-item__content">
                                <h2>{!! $item->title1 ?? '' !!}</h2>
                                <a href="about.html" class="main-slider__one-item__content-curved-circle-box">
                                    <div class="curved-circle">
                                        <!-- curved-circle start-->
                                        <span class="curved-circle--item">
                                            &emsp;&emsp;{!! $item->title2 ?? '' !!} &emsp;&emsp;
                                        </span>
                                    </div><!-- curved-circle end-->
                                    <div class="main-slider__one-item__content-arrow-down">
                                        <span class="icon-down-right"></span>
                                    </div><!-- curved-circle icon -->
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- slider item end -->

    </div>
    @include('components.social')
    <!-- phone start -->
    <div class="main-slider__phone">
    @if (!empty(\App\Models\Settings::getSetting('site_phone')))
        <a href="tel:+{{ \App\Models\Settings::getSetting('site_phone') }}">
            +{{ \App\Models\Settings::getSetting('site_phone') }}
        </a>
    @endif
</div>

    <!-- phone end -->
</section>
<!--Main Slider End-->
