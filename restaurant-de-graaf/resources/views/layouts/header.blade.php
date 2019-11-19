<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-3 header-wrap">
                <div class="header__title">
                    <a class="header__menu-item" href="#">Restaurant <br> de Graaf</a>
                </div>
            </div>
            <div class="col-md-7 header-wrap">
                <ul class="header__menu">
                    <li><a class="header__menu-item" href="#">Reserveren</a></li>
                    <li><a class="header__menu-item" href="#">Menu</a></li>
                    <li><a class="header__menu-item" href="#">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-2 header-wrap">
                <ul class="header__menu">
                    <li>
                        @if (Route::has('login'))
                            @auth
                                <a class="header__menu-item" href="{{ route('logout') }}">Uiloggen</a>
                            @else
                                <a class="header__menu-item" href="{{ route('login') }}">Inloggen</a>
                            @endauth
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
