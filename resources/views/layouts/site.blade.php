<!DOCTYPE html>
<html lang="tr">

<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $settings->site_name ?? 'Site Adı' }} | {{ $page_title ?? 'Sayfa Başlığı' }}</title>

    <!-- Favicon -->
    @if (!empty($settings->site_favicon))
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('uploads/' . $settings->favicon) }}" />
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('uploads/' . $settings->favicon) }}" />
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('uploads/' . $settings->favicon) }}" />
    @endif
    <link rel="manifest" href="{{ asset('assets/images/favicons/site.webmanifest') }}" />

    <!-- Meta Description & Keywords -->
    <meta name="description" content="{{ $settings->meta_description ?? 'Varsayılan Açıklama' }}" />
    <meta name="keywords" content="{{ $settings->meta_keywords ?? 'Varsayılan Anahtar Kelimeler' }}" />

    <!-- Google Tag Manager -->
    @if (!empty($settings->google_tag_manager))
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $settings->google_tag_manager }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', '{{ $settings->google_tag_manager }}');
        </script>
    @endif

    <!-- Google Analytics -->
    @if (!empty($settings->google_analytics))
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $settings->google_analytics }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', '{{ $settings->google_analytics }}');
        </script>
    @endif

    <!-- Facebook Pixel -->
    @if (!empty($settings->facebook_pixel))
        <script>
            ! function(f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function() {
                    n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '{{ $settings->facebook_pixel }}');
            fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
                src="https://www.facebook.com/tr?id={{ $settings->facebook_pixel }}&ev=PageView&noscript=1" /></noscript>
    @endif

    <!-- TikTok Pixel -->
    @if (!empty($settings->tiktok_pixel))
        <script>
            (function() {
                var ta = document.createElement('script');
                ta.type = 'text/javascript';
                ta.async = true;
                ta.src = 'https://analytics.tiktok.com/i18n/pixel/sdk.js?sdkid={{ $settings->tiktok_pixel }}';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ta, s);
            })();
        </script>
    @endif




    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet" crossorigin/>


    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-select/bootstrap-select.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/jquery-ui/jquery-ui.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/animate/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/ogency-icons/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/jarallax/jarallax.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/nouislider/nouislider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/nouislider/nouislider.pips.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/odometer/odometer.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/tiny-slider/tiny-slider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel/assets/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel/assets/owl.theme.default.min.css') }}" />

    <!-- template styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/ogency.css') }}" />
    @if (!empty($settings->custom_css))
        <style>
            {{ $settings->custom_css }}
        </style>
    @endif
    <style>
        {{ $settings->custom_css ?? '' }}
    </style>

</head>

<body class="custom-cursor">

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    @include('components.preloader')
    <div class="page-wrapper">
        @include('components.header')

        @yield('content')
        <!-- Call To Action Start -->
        <section class="cta-one">
            <div class="container text-center wow fadeInUp animated" data-wow-delay="200ms">
                <div class="cta-one__author">
                    <div class="cta-one__author--wrap"><img src="{{ asset('assets/images/resources/photo91.png') }}" loading="lazy"
                            alt="ogency">
                    </div>
                    <a href="contact.html" class="cta-one__icon"><span class="icon-arrow-long"></span></a>
                </div><!-- cta-author -->
                <div class="section-title">
                    <h2 class="section-title__title">Aklında ne var?<br> Bizimle iletişime geç.</h2>
                </div><!-- section-title -->
            </div>
        </section>
        <!-- Call To Action End -->

        <footer class="main-footer" style="background-image: url(assets/images/backgrounds/footer-bg-1.png);">
            <div class="container">
                <div class="main-footer__top wow fadeInUp animated" data-wow-delay="100ms">
                    <a href="{{ route('site.index') }}" class="main-footer__logo">
                        @if (!empty($settings->site_logo))
                            <img src="{{ asset('uploads/' . $settings->site_logo) }}" alt="ogency" width="55"
                                height="55">
                        @endif
                    </a><!-- /.footer-logo -->
                    <div class="main-footer__social">

                        @if (!empty($settings->twitter_url))
                            <a href="{{ $settings->twitter_url ?? '#' }}"><i class="fab fa-twitter"></i></a>
                        @endif
                        @if (!empty($settings->facebook_url))
                            <a href="{{ $settings->facebook_url ?? '#' }}"><i class="fab fa-facebook"></i></a>
                        @endif
                        @if (!empty($settings->pinterest_url))
                            <a href="{{ $settings->pinterest_url ?? '#' }}"><i class="fab fa-pinterest-p"></i></a>
                        @endif
                        @if (!empty($settings->instagram_url))
                            <a href="{{ $settings->instagram_url ?? '#' }}"><i class="fab fa-instagram"></i></a>
                        @endif
                    </div><!-- /.footer-social -->


                </div><!-- footer-top -->
                <div class="row">
                    <div class="col-lg-8 col-md-6 wow fadeInUp animated" data-wow-delay="200ms">
                        <div class="main-footer__about">
                            @if (!empty($settings->meta_title))
                                <p class="footer-widget__text">{{ $settings->meta_title }}</p>
                            @endif
                            @if (!empty($settings->site_email))
                                <a href="mailto:{{ $settings->site_email }}">{{ $settings->site_email }}</a>
                            @endif
                        </div><!-- /.footer-widget -->
                    </div>
                    <div class="col-lg-2 col-md-3 wow fadeInUp animated" data-wow-delay="300ms">
                        <div class="main-footer__navmenu">

                        </div><!-- /.footer-widget -->
                    </div>
                    <div class="col-lg-2 col-md-3 wow fadeInUp animated" data-wow-delay="400ms">
                        <div class="main-footer__navmenu">
                            <ul>
                                <li><a href="{{ route('site.about') }}">Hakkımızda</a></li>
                                <li><a href="{{ route('site.projects') }}">Projelerimiz</a></li>
                                <li><a href="{{ route('site.services') }}">Hizmetlerimiz</a></li>
                                <li><a href="{{ route('site.blog') }}">Bloglar</a></li>
                                <li><a href="{{ route('site.contact') }}">Bize Ulaşın</a></li>
                            </ul><!-- /.list-unstyled -->
                        </div><!-- /.footer-widget -->
                    </div>
                </div><!-- /.row -->
                <p class="main-footer__copyright wow fadeInUp animated" data-wow-delay="500ms">© Copyright <span
                        class="dynamic-year"></span><!-- /.dynamic-year --> by <a
                        href="{{ route('site.index') }}">Arda Sevinç
                    </a></p>
            </div><!-- /.container -->
        </footer><!-- /.main-footer -->

    </div><!-- /.page-wrapper -->


    <div class="mobile-nav__wrapper" id="iletisim">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>
            <div class="logo-box">
                <a href="{{ route('site.index') }}" loading="lazy"s aria-label="logo image"><img src="{{ asset('uploads/'. $settings->site_logo) }}" width="36"
                        alt="ogency" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->
            <ul class="mobile-nav__contact list-unstyled">
                @if (!empty($settings->site_address))
                    <li>
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:{{ $settings->site_email }}">{{ $settings->site_email }}</a>
                    </li>
                @endif
                @if (!empty($settings->site_phone))
                    <li>
                        <i class="icon-phone-call"></i>
                        <a href="tel:{{ $settings->site_phone }}">{{ $settings->site_phone }}</a>
                    </li>
                @endif
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__social">
                @if (!empty($settings->twitter_url))
                    <a href="{{ $settings->twitter_url ?? '#' }}"><i class="fab fa-twitter"></i></a>
                @endif
                @if (!empty($settings->facebook_url))
                    <a href="{{ $settings->facebook_url ?? '#' }}"><i class="fab fa-facebook"></i></a>
                @endif
                @if (!empty($settings->pinterest_url))
                    <a href="{{ $settings->pinterest_url ?? '#' }}"><i class="fab fa-pinterest-p"></i></a>
                @endif
                @if (!empty($settings->instagram_url))
                    <a href="{{ $settings->instagram_url ?? '#' }}"><i class="fab fa-instagram"></i></a>
                @endif
            </div><!-- /.mobile-nav__social -->
        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->


    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form action="{{ route('site.search') }}" method="GET">
                <label for="search" class="sr-only">Burada Ara</label><!-- /.sr-only -->
                <input type="text" id="search" name="query" value="{{ request('query') }}"
                    placeholder="Ne Aramak İstediniz?..." />
                <button type="submit" aria-label="search submit" class="ogency-btn">
                    <i class="icon-magnifying-glass"></i>
                </button>
            </form>
        </div>

        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->

    <!-- back-to-top-start -->
    <a href="#" class="scroll-top">
        <svg class="scroll-top__circle" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </a>
    <!-- back-to-top-end -->
    @if (!empty($settings->custom_js))
        <script>
            {{ $settings->custom_js }}
        </script>
    @endif



    <script src="{{ asset('assets/vendors/jquery/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/vendors/jarallax/jarallax.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-appear/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/odometer/odometer.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/tiny-slider/tiny-slider.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/wnumb/wNumb.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-circleType/jquery.circleType.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-lettering/jquery.lettering.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/wow/wow.js') }}"></script>
    <script src="{{ asset('assets/vendors/isotope/isotope.js') }}"></script>
    <script src="{{ asset('assets/vendors/countdown/countdown.min.js') }}"></script>
    <!-- template js -->
    <script src="{{ asset('assets/js/ogency.js') }}"></script>

</body>

</html>
