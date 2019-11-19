<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3 class="footer__menu-title">Pagina's</h3>
                <ul class="footer__menu">
                    <li><a class="footer__menu-item" href="{{ url('/reserveren') }}">Reserveren</a></li>
                    <li><a class="footer__menu-item" href="{{ url('/menu') }}">Menu</a></li>
                    <li><a class="footer__menu-item" href="{{ url('/contact') }}">Contact</a></li>
                    <li><a class="footer__menu-item" href="{{ url('/faq') }}">F.A.Q.</a></li>
                    <li><a class="footer__menu-item" href="{{ url('/servicevoorwaarden') }}">Servicevoorwaarden</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h3 class="footer__menu-title">Account</h3>
                <ul class="footer__menu">
                    @if (Route::has('login'))
                    @auth
                    <li><a class="footer__menu-item" href="{{ url('/profiel') }}">Profiel</a></li>
                    @else
                    <li><a class="footer__menu-item" href="{{ url('/login') }}">Inloggen</a></li>
                    <li><a class="footer__menu-item" href="{{ url('/registreren') }}">Registreren</a></li>
                    <li><a class="footer__menu-item" href="{{ url('/wachtwoord-vergeten') }}">Wachtwoord vergeten</a></li>
                    @endauth
                    @endif

                </ul>
            </div>
            <div class="col-md-4">
                <h3 class="footer__menu-title">Volg ons</h3>
                <ul class="footer__menu-socials">
                    <a class="footer__menu-item" href="#"><i class="fa fa-facebook-square"></i></a>
                    <a class="footer__menu-item" href="#"><i class="fa fa-twitter-square"></i></a>
                    <a class="footer__menu-item" href="#"><i class="fa fa-instagram"></i></a>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer__disclaimer">
        <p class="footer__disclaimer-text">Copyright &copy; Restaurant de Graaf <?= date('Y'); ?></p>
    </div>
</div>
