
    <div class="stricky-header stricked-menu main-menu">
        <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
    </div><!-- /.stricky-header -->
    <section class="page-header">
        <div class="page-header__bg">
        </div>
        <!-- /.page-header__bg -->
        <div class="page-header__overlay"></div>
        <!-- /.page-header__bg -->
        <div class="container">
            <ul class="page-header__breadcrumb list-unstyled">
                <li><a href="{{ route('site.index') }}">Anasayfa</a></li>
                <li><span>{{ $page_title }}</span></li>
            </ul><!-- /.page-breadcrumb list-unstyled -->
            <h2 class="page-header__title">{{ $page_title }}</h2><!-- /.page-title -->
        </div><!-- /.container -->
    </section><!-- /.page-header -->