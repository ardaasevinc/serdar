@extends('layouts.site')

@section('content')

<div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->
        <section class="page-header">
            <div class="page-header__bg">
            </div>
            <!-- /.page-header__bg -->
            <div class="page-header__overlay"></div>
            <!-- /.page-header__bg -->
            <div class="container">
                <ul class="page-header__breadcrumb list-unstyled">
                    <li><a href="index.html">Anasayfa</a></li>
                    <li><span>{{ $page_title }}</span></li>
                </ul><!-- /.page-breadcrumb list-unstyled -->
                <h2 class="page-header__title">{{ $page_title }}</h2><!-- /.page-title -->
            </div><!-- /.container -->
        </section><!-- /.page-header -->
 <!-- About Start -->
        <section class="about-three">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about-three__thumb">
                            <!-- about thumb start -->
                            {{-- <div class="about-three__thumb--one wow fadeInLeft animated" data-wow-delay="300ms">
                                <img src="{{asset('uploads/'. $about->image2)  }}" alt="ogency">
                            </div> --}}
                            <div class="about-three__thumb--two wow fadeInLeft animated" data-wow-delay="200ms">
                                <img src="{{asset('uploads/'. $about->image1)  }}" alt="ogency">
                            </div>
                        </div><!-- about thumb end -->
                    </div>
                    <div class="col-lg-6">
                        <div class="about-three__content">
                            <!-- about content start-->
                            <div class="section-title">
                                <h5 class="section-title__tagline section-title__tagline--has-dots">{!! $about->title !!}</h5>
                                <h3 class="section-title__title">{!! $about->content1 !!}</h3>
                            </div><!-- section-title -->
                            
                            <p class="about-three__content__text">
                                {!! $about->content2 !!}
                            </p>
                           
                        </div><!-- about content end-->
                    </div>
                </div>
            </div>
        </section>
        <!-- About End -->

@endsection