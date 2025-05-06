

<header class="main-header" id="main-header">
    <nav class="main-menu">
        <div class="container-fluid">
            <div class="main-menu__logo">
                @if (!empty($settings?->light_logo))
                    <a href="{{ route('site.index') }}" loading="lazy" aria-label="logo image">
                        <img src="{{ asset('uploads/' . $settings->light_logo) }}" width="150" alt="{{ $settings->site_name ?? 'Logo' }}" />
                    </a>
                @endif
            </div><!-- /.main-menu__logo -->

            <div class="main-menu__nav">
                <ul class="main-menu__list">
                    <li><a href="{{ route('site.index') }}">Anasayfa</a></li>

                    @php
                        
                        $menus = \App\Models\Page::where('is_published', 1)->where('type', 'menu')->get();
                    @endphp

                    @foreach ($menus as $menu)
                        <li class="dropdown">
                            <a href="#">
                                {{ $menu->title }}
                            </a>

                            @php
                                // Bu menüye bağlı alt menüler
                                $submenus = \App\Models\Page::where('is_published', 1)
                                    ->where('type', 'submenu')
                                    ->where('parent_menu_id', $menu->id)
                                    ->get();
                            @endphp

                            @if ($submenus->count())
                                <ul class="submenu">
                                    @foreach ($submenus as $submenu)
                                        <li>
                                            <a href="{{ route('page-detail', ['slug' => $submenu->slug]) }}">
                                                {{ $submenu->title }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach

                    <li class=""><a href="{{ route('site.about') }}">Hakkımızda</a></li>
                    <li class=""><a href="{{ route('site.services') }}">Hizmetlerimiz</a></li>
                    <li class=""><a href="{{ route('site.projects') }}">Projelerimiz</a></li>
                    <li class=""><a href="{{ route('site.blog') }}">Blog</a></li>
                    <li class=""><a href="{{ route('site.faq') }}">S.S.S</a></li>
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
            </div><!-- /.main-menu__right -->
        </div><!-- /.container -->
    </nav><!-- /.main-menu -->
</header><!-- /.main-header -->
