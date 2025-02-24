@extends('layouts.site')

@section('content')
    @include('components.header')
    @include('components.page-header')


    <section class="about-one">
    <div class="container">
        <div class="row">
            <p>{!! $page->content !!}</p>

            @if ($page->contents->count())
                <div class="page-contents">
                    @foreach ($page->contents as $content)
                        <div class="content-item">
                            
                            <p>{!! $content->content !!}</p>

                            @if ($content->image)
                                <img src="{{ asset('uploads/' . $content->image) }}" alt="{{ $content->title }}">
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</section>

@endsection
