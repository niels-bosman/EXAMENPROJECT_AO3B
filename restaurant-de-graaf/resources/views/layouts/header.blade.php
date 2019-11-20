<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-3 header-wrap">
                <div class="header__title">
                    <a class="header__menu-item" href="/">Restaurant <br> de Graaf</a>
                </div>
            </div>
            <div class="col-md-6 header-wrap">
                <ul class="header__menu header__menu--right">
                    <li>
                        <a class="header__menu-item @if (\Request::is('reserveren')) header__menu-item--active @endif" href="/reserveren">Reserveren</a>
                    </li>
                    <li>
                        <a class="header__menu-item @if (\Request::is('menu')) header__menu-item--active @endif" href="/menu">Menu</a>
                    </li>
                    <li>
                        <a class="header__menu-item @if (\Request::is('contact')) header__menu-item--active @endif" href="/contact">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 header-wrap">
                <ul class="header__menu header__menu--right">

                    @if (Route::has('login'))
                        @auth
                            <li>
                                <a class="header__menu-item" href="/profiel">Profiel</a>
                            </li>
                            <li>
                                <a class="header__menu-item" href="{{ route('logout') }}">Uitloggen</a>
                            </li>
                        @else
                            <li>
                                <a class="header__menu-item  @if (\Request::is('login')) header__menu-item--active @endif" href="{{ route('login') }}">Inloggen</a>
                            </li>
                        @endauth
                    @endif

                </ul>
            </div>
        </div>
    </div>
</div>
