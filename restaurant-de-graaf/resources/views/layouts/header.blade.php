<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-2 header-wrap">
                <div class="header__title">
                    @if(isset($check))
                        @if($check > 1)
                            <a class="header__menu-item" href="/beheer">Restaurant<br> de Graaf</a>
                        @else
                            <a class="header__menu-item" href="/">Restaurant <br> de Graaf</a>
                        @endif
                    @else
                        <a class="header__menu-item" href="/">Restaurant <br> de Graaf</a>
                    @endif
                </div>
            </div>
            <div class="col-md-7 header-wrap">
                @if(isset($check))
                    @if($check > 1)
                        <ul class="header__menu">
                            <li>
                                <a class="header__menu-item @if (\Request::is('beheer/reserveringen')) header__menu-item--active @endif" href="/beheer/reserveringen">Reserveringen</a>
                            </li>
                            <li>
                                <a class="header__menu-item @if (\Request::is('beheer/gebruikers')) header__menu-item--active @endif" href="/beheer/gebruikers">Gebruikers</a>
                            </li>
                            <li>
                                <a class="header__menu-item @if (\Request::is('beheer/producten')) header__menu-item--active @endif" href="/beheer/producten">Producten</a>
                            </li>
                            <li>
                                <a class="header__menu-item @if (\Request::is('beheer/tafels')) header__menu-item--active @endif" href="/beheer/tafels">Tafels</a>
                            </li>
                        </ul>
                    @else
                        <ul class="header__menu">
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
                    @endif
                @else
                    <ul class="header__menu">
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
                @endif
            </div>
            <div class="col-md-3 header-wrap">
                <ul class="header__menu header__menu--right">

                    @if (Route::has('login'))
                        @auth
                            <li>
                                <a class="header__menu-item @if (\Request::is('profiel')) header__menu-item--active @endif" href="/profiel">Profiel</a>
                            </li>
                            @if(isset($check))
                                @if($check > 1)
                                    <li>
                                        <a class="header__menu-item @if (\Request::is('beheer/reserveren/new')) header__menu-item--active @endif" href="/beheer/reserveren/new">Reserveren</a>
                                    </li>
                                @endif
                            @endif
                            <li>
                                <a class="header__menu-item" href="{{ route('logout') }}">Uitloggen</a>
                            </li>
                        @else
                            <li>
                                <a class="header__menu-item  @if (\Request::is('login')) header__menu-item--active @endif" href="/login">Inloggen</a>
                            </li>
                            <li>
                                <a class="header__menu-item  @if (\Request::is('register')) header__menu-item--active @endif" href="/registeer">Registreren</a>
                            </li>
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
