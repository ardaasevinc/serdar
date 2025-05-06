@extends('layouts.site')

@section('content')

    @include('components.page-header')

    @if($faq->count())
        <!-- Faq Start -->
        <section class="faq-page">
            <div class="container">
                <div class="section-title wow fadeInUp animated" data-wow-delay="200ms">
                    <h5 class="section-title__tagline section-title__tagline--has-dots">sizin için derledik</h5>
                    <h2 class="section-title__title">Sıkça sorulan soruların<br> cevapları burada</h2>
                </div>
                <!-- section-title -->
                <div class="row">
                    <div class="col-xl-3 col-lg-4 wow fadeInLeft animated" data-wow-delay="300ms">
                        <div class="faq-page__help">
                            <div class="faq-page__help__bg"
                                style="background-image: url(assets/images/backgrounds/faq-help.jpg);"></div>
                            <div class="faq-page__help__icon"><span class="icon-phone-call"></span></div>
                            <h3 class="faq-page__help__title">Başka bir sorunuz var mı?</h3>
                            <p class="faq-page__help__text">Bizi arayın</p>
                            @if(!empty($settings?->site_phone))
                                <h5 class="faq-page__help__number"><a
                                        href="tel:+{{$settings->site_phone}}">+{{$settings->site_phone}}</a></h5>
                            @endif
                        </div><!-- help-info -->
                    </div>
                    <div class="col-xl-9 col-lg-8 wow fadeInRight animated" data-wow-delay="400ms">
                        <div class="faq-page__accrodion" data-grp-name="faq-one-accrodion">

                            @foreach($faq as $item)
                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4>{{$item->question}}</h4>
                                    </div><!-- /.accordian-title -->
                                    <div class="accrodion-content">
                                        <div class="inner">
                                            <p>{{$item->answer}}</p>
                                        </div><!-- /.accordian-content -->
                                    </div>
                                </div><!-- /.accordian-item -->
                            @endforeach





                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Faq End -->
    @endif
@endsection