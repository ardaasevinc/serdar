@extends('layouts.site')

@section('content')

@include('components.paginate')
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


        @if(!empty($blog))
<!-- Blog Start -->
<section class="blog-one" id="blog">
   <div class="container">
      
      <div class="row">
    @foreach ($blog as $item)
        <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
            <div class="blog-one__item">
                <div class="blog-one__item__image">
                    <img src="{{ asset('uploads/'.$item->image) }}" alt="{!! Str::limit($item->title, 47) !!}">
                    <a href="{{ route('blog-detail', ['id' => $item->id]) }}"></a>
                    <span>{{ \Carbon\Carbon::parse($item->created_at)->format('d M') }}</span>
                </div><!-- /.blog-image -->
                <div class="blog-one__item__content">
                    <div class="blog-one__item__meta has-border">
                        <a href="blog-details.html">{{ $item->category->name ?? 'Kategori Yok' }}</a>
                        <span>.</span> {{ $blog->total() }} Blog
                    </div><!-- /.blog-meta -->
                    <h3 class="blog-one__item__title">
                        <a href="{{ route('blog-detail', ['id' => $item->id]) }}">
                            {!! Str::limit($item->title, 47) !!}
                        </a>
                    </h3><!-- /.blog-title -->
                    <a class="blog-one__item__btn" href="{{ route('blog-detail', ['id' => $item->id]) }}">
                        Read More<span class="icon-down-right"></span>
                    </a><!-- /.blog-read-more -->
                </div><!-- /.blog-content -->
            </div><!-- /.blog-card-one -->
        </div>
    @endforeach
</div>

<!-- Sayfalama Butonları -->
<div class="pagination-wrapper mt-5 mb-2">
    {{ $blog->links() }}
</div>

   </div>
</section>
<!-- Blog End -->
@endif
@endsection