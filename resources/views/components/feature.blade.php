@if(!empty($portfolio))
  
<!-- Feature Start -->
<section class="feature-one">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 wow fadeInUp animated" data-wow-delay="200ms">
                <div class="feature-one__item">


                    <!-- feature item start -->
                    @foreach ($portfolio as $item)
                        <div class="feature-one__item__img">

                            @foreach ($item->getMedia('portfolio_images') as $image)
                                <img src="{{ asset('uploads/' . $item->id . '/' . $image->file_name) }}"
                                    alt="Portfolio Image">
                            @endforeach




                        </div>
                        <div class="feature-one__item__content">
                            <h4 class="feature-one__item__content--title">{{ $item->title }}</h4>
                            <div class="feature-one__item__content--icon"><span class="icon-idea"></span></div>
                        </div><!-- feature normal content -->
                        <div class="feature-one__item__hover-content">
                            <h4 class="feature-one__item__hover-content--title">{{ $item->title }}</h4>
                            <p class="feature-one__item__hover-content--text">{{ $item->description }}</p>
                            <a class="feature-one__item__hover-content__btn" href="website-development.html">Daha
                                Fazlası
                                <span class="icon-down-right"></span></a>
                        </div><!-- feature hover content -->
                    @endforeach
                </div><!-- feature item end -->



            </div>
        </div>
</section>
<!-- Feature End -->
@endif