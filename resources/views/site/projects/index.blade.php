@extends('layouts.site')

@section('content')

@include('components.paginate')

@if(!empty($portfolio))
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

                                <img src="{{ asset('uploads/' . $item->id . '/' . $image->file_name) }}"
                                    alt="Portfolio Image">
                            @endforeach</div>
                  <!-- /.project-hover-image -->
               </div>
            </a><!-- /.project-item-one -->
            @endforeach
           
           
           
         </div>
      </div>

      <!-- Sayfalama Butonları -->
<div class="pagination-wrapper mt-5 mb-2">
    {{ $portfolio->links() }}
</div>
   </div>
</section>
<!-- Project End -->
@endif



@endsection