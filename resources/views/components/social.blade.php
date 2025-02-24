<!-- social start -->
<div class="main-slider__socails">
    @if (!empty(\App\Models\Settings::getSetting('twitter_url')))
        <a href="{{ \App\Models\Settings::getSetting('twitter_url', '#') }}">
            <i class="fab fa-twitter"></i>
        </a>
    @endif

    @if (!empty(\App\Models\Settings::getSetting('facebook_url')))
        <a href="{{ \App\Models\Settings::getSetting('facebook_url', '#') }}">
            <i class="fab fa-facebook"></i>
        </a>
    @endif

    @if (!empty(\App\Models\Settings::getSetting('pinterest_url')))
        <a href="{{ \App\Models\Settings::getSetting('pinterest_url', '#') }}">
            <i class="fab fa-pinterest-p"></i>
        </a>
    @endif

    @if (!empty(\App\Models\Settings::getSetting('instagram_url')))
        <a href="{{ \App\Models\Settings::getSetting('instagram_url', '#') }}">
            <i class="fab fa-instagram"></i>
        </a>
    @endif
</div>

<!-- social end -->