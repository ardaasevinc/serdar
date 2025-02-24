@if(!empty($blog))
<!-- Blog Start -->
<section class="blog-one" id="blog">
   <div class="container">
      <div class="row">
         <div class="col-md-12 wow fadeInUp" data-wow-delay="100ms">
            <div class="section-title text-center">
               <h5 class="section-title__tagline section-title__tagline--has-dots">Yazılarımız</h5>
               <h2 class="section-title__title">En Güncel Haberler &<br> Blog Yazılarımız</h2>
            </div><!-- section-title -->
         </div>
      </div>
      <div class="row">
         @foreach ($blog as $item )
            
         
         <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="200ms">
            <div class="blog-one__item">
               <div class="blog-one__item__image">
                  <img src="{{ asset('uploads/'.$item->image) }}" loading="lazy" alt="{!! Str::limit($item->title, 47) !!}">
                  <a href="{{ route('blog-detail', ['id' => $item->id]) }}"></a>
                  <span>{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F') }}</span>
               </div><!-- /.blog-image -->
               <div class="blog-one__item__content">
                  <div class="blog-one__item__meta has-border"><a href="blog-details.html">{{ $item->category->name }}</a><span>.</span>{{ $item->count() }}
                     Blog</div><!-- /.blog-meta -->
                  <h3 class="blog-one__item__title">
                     <a href="{{ route('blog-detail', ['id' => $item->id]) }}">{!! Str::limit($item->title, 47) !!}
</a>
                  </h3><!-- /.blog-title -->
                  <a class="blog-one__item__btn" href="{{ route('blog-detail', ['id' => $item->id]) }}">Daha Fazlası<span
                        class="icon-down-right"></span></a><!-- /.blog-read-more -->
               </div><!-- /.blog-content -->
            </div><!-- /.blog-card-one -->
         </div>

         @endforeach
         
         
      </div>
   </div>
</section>
<!-- Blog End -->
@endif