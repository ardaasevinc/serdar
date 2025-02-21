@extends('layouts.site')
@section('content')
 <!-- Error Start -->
        <section class="error-page">
            <div class="container">
                <div class="error-page__content">
                    <h1 class="error-page__404">404<img src="{{ asset('assets/images/resources/404.png') }}" alt="ogency"></h1><!-- 404 -->
                    <h4 class="error-page__title">Hay Aksi! Birşeyler yanlış gitti.</h4><!-- 404-title -->
                    <p class="error-page__text">Yanlış bir sayfa aradığınızı düşünüyoruz..</p><!-- 404-content -->
                    <form class="error-page__form" action="{{ route('site.search') }}">
                     
                        <div class="error-page__form-input">

                            <input type="search" id="search" name="query" value="{{ request('query') }}" placeholder="Tekrar Arayın...">
                            <button type="submit"><i class="icon-magnifying-glass"></i></button>

                        </div>
                    </form><!-- 404-search-form -->
                    <a href="{{ route('site.index') }}" class="ogency-btn">Anasayfa ya geri dön.</a><!-- 404-btn -->
                </div><!-- 404-info -->
            </div>
        </section>
        <!-- Error End -->

@endsection
