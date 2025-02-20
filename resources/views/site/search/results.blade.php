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
                <li><span>Arama Sonuçları</span></li>
            </ul><!-- /.page-breadcrumb list-unstyled -->
            <h2 class="page-header__title">Arama Sonuçları</h2><!-- /.page-title -->
        </div><!-- /.container -->
    </section><!-- /.page-header -->



    <section class="blog-details">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-7">


                    <h2 class="text-2xl font-bold mb-4">"{{ $query }}" için arama sonuçları</h2>

                    @if ($blogs->isEmpty() && $services->isEmpty() && $portfolios->isEmpty())
                        <p class="text-gray-600">Sonuç bulunamadı.</p>
                    @endif

                    @if (!$blogs->isEmpty())
                        <h3 class="text-xl font-semibold mt-6">Blog Yazıları</h3>
                        <ul>
                            @foreach ($blogs as $blog)
                                <li>
                                    <a href="{{ route('blog-detail', ['id' => $blog->id]) }}" class="text-blue-500">
                                        {{ $blog->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        {{ $blogs->links() }}
                    @endif

                    @if (!$services->isEmpty())
                        <h3 class="text-xl font-semibold mt-6">Hizmetler</h3>
                        <ul>
                            @foreach ($services as $service)
                                <li>
                                    <a href="{{ route('service-detail', ['id' => $service->id]) }}" class="text-green-500">
                                        {{ $service->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        {{ $services->links() }}
                    @endif

                    @if (!$portfolios->isEmpty())
                        <h3 class="text-xl font-semibold mt-6">Projeler</h3>
                        <ul>
                            @foreach ($portfolios as $portfolio)
                                <li>
                                    <a href="{{ route('project-detail', ['id' => $portfolio->id]) }}" class="text-red-500">
                                        {{ $portfolio->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        {{ $portfolios->links() }}
                    @endif

                </div>
            </div>
        </div>
    </section>






@endsection
