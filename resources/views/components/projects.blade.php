
@if(!empty($portfolio))
<!-- Project Start -->
<section class="project-one @@extraClassName" id="projelerimiz">
   <div class="container">
      <div class="row">
         <div class="col-md-8">
            <div class="section-title">
               <h5 class="section-title__tagline section-title__tagline--has-dots">Neler Yaptık?</h5>
               <h2 class="section-title__title">En Yeni<br> Tamamladığımız Projelerimiz</h2>
            </div><!-- section-title -->
         </div>
         {{-- <div class="col-md-4 text-end">
            <a href="projects.html" class="ogency-btn">View All Work</a><!-- section-btn -->
         </div> --}}
      </div>
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

                                <img src="{{ asset('uploads/' . $image->id . '/' . $image->file_name) }}"
                                    alt="Portfolio Image">
                            @endforeach</div>
                  <!-- /.project-hover-image -->
               </div>
            </a><!-- /.project-item-one -->
            @endforeach
           
           
           
         </div>
      </div>
   </div>
</section>
<!-- Project End -->
@endif