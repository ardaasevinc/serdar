<header class="main-header" id="main-header">
   <nav class="main-menu">
      <div class="container-fluid">
         <div class="main-menu__logo">
            <a href="{{ route('site.index') }}">
               <img src="{{ asset('assets/images/logo.svg') }}" width="50" height="auto" alt="Ogency">
            </a>
         </div><!-- /.main-menu__logo -->
         <div class="main-menu__nav">
            <ul class="main-menu__list">
               <li class="dropdown megamenu">
                  <a href="{{ route('site.index') }}">Anasayfa</a>
                  
               </li>
               <li class="dropdown">
                  <a href="{{ route('site.about') }}">Hakkımızda</a>
                  
               </li>
               <li class="dropdown">
                  <a href="{{ route('site.services') }}">Hizmetlerimiz</a>
                  
               </li>
               <li class="dropdown">
                  <a href="{{ route('site.projects') }}">Projelerimiz</a>
                 
               </li>
      
               <li class="dropdown">
                  <a href="{{ route('site.blog') }}">Blog</a>
                  
               </li>
               <li><a href="{{ route('site.contact') }}">İletişim</a></li>
            </ul>
         </div><!-- /.main-menu__nav -->
         <div class="main-menu__right">
            <a href="#" class="main-menu__toggler mobile-nav__toggler">
               <i class="fa fa-bars"></i>
            </a><!-- /.mobile menu btn -->
            <a href="#" class="main-menu__search search-toggler">
               <i class="icon-magnifying-glass"></i>
            </a><!-- /.search btn -->
            {{-- <a href="cart.html" class="main-menu__cart cart-toggler">
               <i class="icon-shopping-cart"></i>
            </a><!-- /.cart btn --> --}}
         </div><!-- /.main-menu__right -->
      </div><!-- /.container -->
   </nav>
   <!-- /.main-menu -->
</header><!-- /.main-header -->