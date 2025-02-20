@extends('layouts.site')

@section('content')

<div class="stricky-header stricked-menu main-menu" >
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->
        @include('components.slider')
        @include('components.client')
        {{-- @include('components.feature') --}}
        @include('components.about')
        <!-- Sliding Text Start-->
        <section class="slider-text-one">
            <div class="slider-text-one__animate-text">
                @foreach ($slidetext as $item )
                     <span>{{ $item->first()->title }} <span>&</span> {{ $item->skip(1)->first()->title ?? '' }}&nbsp;</span>
                <span>{{ $item->skip(2)->first()->title ?? '' }} <span>&</span> {{ $item->skip(3)->first()->title ?? 'İkinci eleman yok' }}&nbsp;</span>
                @endforeach
               
            </div>
        </section>
        <!-- Sliding Text Start-->
        {{-- @include('components.video') --}}
        @include('components.service')

        @include('components.projects')
        {{-- @include('components.team') --}}
        @include('components.complete-projects')
        @include('components.slide-text')
        {{-- @include('components.testimonial') --}}
      @include('components.blog')
    @endsection