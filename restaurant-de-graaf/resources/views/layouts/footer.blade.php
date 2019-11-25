<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3 class="footer__menu-title">Pagina's</h3>
                <ul class="footer__menu">
                    <li><a class="footer__menu-item" href="/reserveren">Reserveren</a></li>
                    <li><a class="footer__menu-item" href="/menu">Menu</a></li>
                    <li><a class="footer__menu-item" href="/contact">Contact</a></li>
                    <li><a class="footer__menu-item" href="/faq">F.A.Q.</a></li>
                    <li><a class="footer__menu-item" href="/servicevoorwaarden">Servicevoorwaarden</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h3 class="footer__menu-title">Account</h3>
                <ul class="footer__menu">
                    @if (Route::has('login'))
                    @auth
                    <li><a class="footer__menu-item" href="{{ url('/profiel') }}">Profiel</a></li>
                    @if(User::check_privileges() > 1)
                    <li><a class="footer__menu-item @if (\Request::is('beheer/reserveringen')) header__menu-item--active @endif" href="/beheer/reserveringen">Reserveringen</a></li>
                    <li><a class="footer__menu-item @if (\Request::is('beheer/gebruikers')) header__menu-item--active @endif" href="/beheer/gebruikers">Gebruikers</a></li>
                    <li><a class="footer__menu-item @if (\Request::is('beheer/producten')) header__menu-item--active @endif" href="/beheer/producten">Producten</a></li>
                    <li><a class="footer__menu-item @if (\Request::is('beheer/tafels')) header__menu-item--active @endif" href="/beheer/tafels">Tafels</a></li>
                    @endif
                    @else
                    <li><a class="footer__menu-item" href="{{ url('/login') }}">Inloggen</a></li>
                    <li><a class="footer__menu-item" href="{{ url('/registreer') }}">Registreren</a></li>
                    <li><a class="footer__menu-item" href="{{ url('/wachtwoord-vergeten') }}">Wachtwoord vergeten</a></li>
                    @endauth
                    @endif

                </ul>
            </div>
            <div class="col-md-4">
                <h3 class="footer__menu-title">Volg ons</h3>
                <ul class="footer__menu-socials">
                    <a class="footer__menu-item" href="#"><i class="fab fa-facebook-square"></i></a>
                    <a class="footer__menu-item" href="#"><i class="fab fa-twitter-square"></i></a>
                    <a class="footer__menu-item" href="#"><i class="fab fa-instagram"></i></a>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer__disclaimer">
        <p class="footer__disclaimer-text">Copyright &copy; Restaurant de Graaf <?= date('Y'); ?></p>
    </div>
</div>
<script type="text/javascript" src="/js/app.js"></script>
