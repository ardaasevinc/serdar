@if(!empty($about))

<!-- About Start -->
<section class="about-one" id="hakkimizda">
   <div class="container">
      <div class="row">
         <div class="col-lg-6">
                        <div class="about-three__thumb">
                            <!-- about thumb start -->
                            <div class="about-three__thumb--one wow fadeInLeft animated" data-wow-delay="300ms">
                                <img src="{{asset('uploads/'. $about->image2)  }}" alt="ogency">
                            </div>
                            <div class="about-three__thumb--two wow fadeInLeft animated" data-wow-delay="200ms">
                              <img src="{{asset('uploads/'. $about->image1)  }}" loading="lazy" alt="ogency">
                            </div>
                        </div><!-- about thumb end -->
                    </div>
         <div class="col-lg-6">
            <div class="about-one__content">
               <!-- about content start-->
               <div class="section-title">
                  <h5 class="section-title__tagline section-title__tagline--has-dots">{!! $about->title !!}</h5>
                  <h2 class="section-title__title">{!! $about->content1 !!}</h2>
               </div><!-- section-title -->
               <p class="about-one__content__text-one">{!!Str::limit( $about->content2,500) !!}</p>
               
               <a href="{{ route('site.about') }}" class="ogency-btn">Daha Fazlası</a>
            </div><!-- about content end-->
         </div>
      </div>
   </div>
</section>
<!-- About End -->

@endif