<!--Sliding Text Start -->
<section class="sliding-text @@extraClassName">
   <div class="sliding-text__wrap">


      <ul class="sliding-text__list list-unstyled">
         @foreach ($slidetext as $item)
         <a href="{{ $item->url }}"><li>*{{ $item->title }}</li></a>
         @endforeach
      </ul>
   </div>
</section>
<!--Sliding Text Start -->