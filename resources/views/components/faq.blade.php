<div class="col-xl-9 col-lg-8 wow fadeInRight animated" data-wow-delay="400ms">
    <div class="faq-page__accrodion" data-grp-name="faq-one-accrodion">

        @foreach($faq as $item)
            <div class="accrodion">
                <div class="accrodion-title">
                    <h4>{{$item->question}}</h4>
                </div><!-- /.accordian-title -->
                <div class="accrodion-content">
                    <div class="inner">
                        <p>{{$item->answer}}</p>
                    </div><!-- /.accordian-content -->
                </div>
            </div><!-- /.accordian-item -->
        @endforeach





    </div>
</div>