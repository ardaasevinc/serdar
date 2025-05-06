
<!-- social start -->
<div class="main-slider__socails">
    @if (!empty($settings?->twitter_url))
        <a href="{{ $settings->twitter_url }}">
            <i class="fab fa-twitter"></i>
        </a>
    @endif

    @if (!empty($settings?->facebook_url))
        <a href="{{ $settings->facebook_url }}">
            <i class="fab fa-facebook"></i>
        </a>
    @endif

    @if (!empty($settings?->pinterest_url))
        <a href="{{ $settings->pinterest_url }}">
            <i class="fab fa-pinterest-p"></i>
        </a>
    @endif

    @if (!empty($settings?->instagram_url))
        <a href="{{ $settings->instagram_url }}">
            <i class="fab fa-instagram"></i>
        </a>
    @endif

     @if (!empty($settings?->site_phone))
        <a href="https://wa.me/{{ $settings->site_phone }}">
            <i class="fab fa-whatsapp"></i>
        </a>
    @endif
</div>
<!-- social end -->
