@extends('layouts.site')
@section('content')
@include('components.page-header')
    <!--Blog Start-->
    <section class="blog-details">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-7">
                    <div class="blog-details__content">
                        <div class="blog-details__img">
                            <img src="{{ asset('uploads/' . $blog->image) }}" loading="lazy" alt="{!! Str::limit($blog->title, 47) !!}" />
                            <span
                                class="blog-details__img__date">{{ \Carbon\Carbon::parse($blog->created_at)->format('d M') }}</span>
                        </div><!-- details-image -->
                        <div class="blog-details__meta"><a
                                href="blog-details.html">{{ $blog->category->name }}</a><span>.</span>{{ $blog->count() }}
                            Blog</div><!-- /.details-meta -->
                        <h3 class="blog-details__title">{{ $blog->title }}</h3><!-- details-tiele -->
                        <p class="blog-details__text">
                            {!! $blog->content !!}
                        </p>

                    </div><!-- details-content -->
                    {{-- <div class="blog-details__bottom">
                            <div class="blog-details__tags">
                                <h5 class="blog-details__tags__title">Tags</h5>
                                <a href="blog-grid-left.html">Marketing</a>
                                <a href="blog-grid-right.html">development</a>
                            </div>
                            <div class="blog-details__social">
                                <a href="https://www.google.com/"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.google.com/"><i class="fab fa-facebook"></i></a>
                                <a href="https://www.google.com/"><i class="fab fa-pinterest-p"></i></a>
                                <a href="https://www.google.com/"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div><!-- details-tags-share --> --}}
                    <div class="blog-details__pagenation">
                        @if ($previousBlog)
                            <div class="blog-details__item">
                                <div class="blog-details__item__img">
                                    <img src="{{ asset('uploads/' . $previousBlog->image) }}"
                                        alt="{{ $previousBlog->title }}">
                                </div>
                                <div class="blog-details__pagenation__content">
                                    <p class="blog-details__pagenation__date">
                                        {{ \Carbon\Carbon::parse($previousBlog->created_at)->format('d M, Y') }}</p>
                                    <h4 class="blog-details__pagenation__title">
                                        <a href="{{ route('blog-detail', ['id' => $previousBlog->id]) }}">
                                            {{ Str::limit($previousBlog->title, 40) }}
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        @endif

                        @if ($nextBlog)
                            <div class="blog-details__item blog-details__item-right">
                                <div class="blog-details__pagenation__content">
                                    <p class="blog-details__pagenation__date">
                                        {{ \Carbon\Carbon::parse($blog->created_at)->translatedFormat('d F') }}</p>
                                    <h4 class="blog-details__pagenation__title">
                                        <a href="{{ route('blog-detail', ['id' => $nextBlog->id]) }}">
                                            {{ Str::limit($nextBlog->title, 40) }}
                                        </a>
                                    </h4>
                                </div>
                                <div class="blog-details__item__img">
                                    <img src="{{ asset('uploads/' . $nextBlog->image) }}"
                                        alt="{{ $nextBlog->title }}">
                                </div>
                            </div>
                        @endif
                    </div><!-- details-pagination -->


                </div>
            </div>
        </div>
    </section>
    <!--Blog End-->
@endsection
