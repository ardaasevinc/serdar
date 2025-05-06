@extends('layouts.site')

@section('content')

@include('components.paginate')

@if(!empty($portfolio))
@include('components.page-header')
<!-- Project Start -->
<section class="project-one @@extraClassName" id="projelerimiz">
   <div class="container">
      
      <div class="row">
         <div class="col-md-12">
            @foreach($portfolio as $item)
            <a href="{{ route('project-detail', ['id' =>$item->id]) }}" class="project-one__item wow fadeInUp animated animated"
               data-wow-delay="100ms">
               <div class="project-one__item__wrapper">
                  <span class="project-one__item__number"></span>
                  <h3 class="project-one__item__title">{{ $item->title }}</h3><!-- /.project-title -->
                  <div class="project-one__item__btn"><span class="icon-down-right"></span></div>
                  <!-- /.project-btn -->
                  <div class="project-one__item__hover">
                       @foreach ($item->getMedia('portfolio_images') as $image)

                                <img src="{{ asset('uploads/' . $image->id . '/' . $image->file_name) }}" loading="lazy"
                                    alt="Portfolio Image">
                            @endforeach</div>
                  <!-- /.project-hover-image -->
               </div>
            </a><!-- /.project-item-one -->
            @endforeach
           
           
           
         </div>
      </div>

      <!-- Sayfalama Butonları -->
<div class="pagination-wrapper mt-5 mb-2 d-flex justify-content-center">
    {{ $portfolio->links() }}
</div>
   </div>
</section>
<!-- Project End -->
@endif



@endsection