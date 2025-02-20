<!-- Service Start -->
<section class="service-one @@extraClassName" id="hizmetlerimiz">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="section-title text-center">
               <h5 class="section-title__tagline section-title__tagline--has-dots">Sizin için çabalıyoruz.</h5>
               <h2 class="section-title__title">Müşterilerimize <br> sunduğumuz hizmetlerimiz</h2>
            </div><!-- section-title -->
         </div>
      </div>

    
         
   
      <div class="row">
           @foreach ($services as $item )
         <div class="col-lg-3 col-md-6 wow fadeInUp animated" data-wow-delay="100ms">
            <div class="service-one__item">
               <div class="service-one__item__icon">
                  <span class="{{ $item->icon }}"></span>
               </div><!-- /.service-icon -->
               <h3 class="service-one__item__title">
                  <a href="website-development.html">{!! $item->title !!}</a>
               </h3><!-- /.service-title -->
               <p class="service-one__item__text">{!! Str::limit($item->content, 60) !!}
</p>
               <!-- /.service-content -->
               <a class="service-one__item__btn" href="{{ route('service-detail', ['id' => $item->id]) }}">
    Daha Fazlası <span class="icon-down-right"></span>
</a>

            </div><!-- /.service-card-one -->
             
         </div>
@endforeach
     
         
        
      </div>
   </div>
</section>
<!-- Service Start -->