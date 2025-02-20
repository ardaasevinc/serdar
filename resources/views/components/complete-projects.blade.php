{{-- veri  --}}
@if(!empty($data))
   

<section class="fact-one" id="bitmis-projeler">
   <div class="container">
      <div class="row">
         @foreach ($data as $item )
         
         <div class="col-lg-3 col-md-6 wow fadeInUp animated" data-wow-delay="100ms">
            <div class="fact-one__item text-center">
               <div class="{{ $item->icon }}"><span class="icon-complete"></span></div>
               <!-- /.fact-one__icon -->
               <div class="fact-one__item__count">
                  <span class="count-box">
                     <span class="count-text" data-stop="{{ $item->data }}" data-speed="1500"></span>
                  </span>K
               </div><!-- /.fact-one__count -->
               <h3 class="fact-one__item__title">{{ $item->title }}</h3><!-- /.fact-one__title -->
            </div><!-- /.fact-one__item -->
         </div><!-- /.col-lg-3 col-md-6 -->
         
        @endforeach
         
      </div><!-- /.row -->
   </div><!-- /.container -->
</section><!-- /.fact-one -->
@endif