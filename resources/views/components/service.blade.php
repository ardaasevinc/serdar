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

    </div>
</section>
<!-- Service Start -->
