@extends('layouts.site')
@section('content')
@include('components.page-header')



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
