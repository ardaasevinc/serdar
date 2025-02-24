@if(!empty($partners))
<div class="client-carousel @@extraClassName" id="is-ortaklari">
    <div class="container">
        <h5 class="client-carousel__tilte"><span>İş Ortakları</span></h5><!-- section-title -->
        <div class="client-carousel__one ogency-owl__carousel owl-theme owl-carousel"
            data-owl-options='{
            "items": 5,
            "margin": 120,
            "smartSpeed": 700,
            "loop":true,
            "autoplay": 6000,
            "nav":false,
            "dots":false,
            "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
            "responsive":{
                "0":{
                    "items":1,
                    "margin": 0
                },
                "360":{
                    "items":2,
                    "margin": 0
                },
                "575":{
                    "items":3,
                    "margin": 0
                },
                "768":{
                    "items":4,
                    "margin": 0
                },
                "992":{
                    "items": 5,
                    "margin": 0
                },
                "1200":{
                    "items": 5,
                    "margin": 120
                }
            }
            }'>
            
               
            
            <div class="client-carousel__one__item">
                @foreach ($partners as $item )
                <a href="{{ $item->url }}"><img src="{{ asset('uploads/' . $item->image) }}" loading="lazy" alt="ogency"></a>
                @endforeach
            </div><!-- /.owl-slide-item-->
           

        </div><!-- /.thm-owl__slider -->
    </div><!-- /.container -->
</div><!-- /.client-carousel -->
@endif