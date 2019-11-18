<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-3 header-wrap">
                <div class="header__title">
                    <a class="header__menu-item" href="/">Restaurant <br> de Graaf</a>
                </div>
            </div>
            <div class="col-md-7 header-wrap">
                <ul class="header__menu">
                    <li><a class="header__menu-item" href="/reserveren">Reserveren</a></li>
                    <li><a class="header__menu-item" href="/menu">Menu</a></li>
                    <li><a class="header__menu-item" href="/contact">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-2 header-wrap">
                <ul class="header__menu">
                    <li>
                        @if (Route::has('login'))
                            @auth
                                <a class="header__menu-item" href="{{ route('logout') }}">Uiloggen</a>
                            @else
                                <a class="header__menu-item  @if (\Request::is('login')) header__menu-item--active @endif" href="{{ route('login') }}">Inloggen</a>
                            @endauth
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
