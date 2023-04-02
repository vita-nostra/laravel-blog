<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Oleez :: Blog Standard</title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/animate.css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/fancybox/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/loader.js') }}"></script>
</head>

<body>
<div class="oleez-loader"></div>
<header class="oleez-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="{{ route('main.index') }}"><img src="{{ asset('assets/images/logo-b.png') }}"
                                                                      alt="Tasty Finds" style="width: 200px"></a>
        <div class="collapse navbar-collapse" id="oleezMainNav">
            <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
            </ul>
            <ul class="navbar-nav d-none d-lg-flex">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Войти</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('personal.main.index') }}" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Выйти') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @if(auth()->user()->role == $admin)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.main.index') }}">Панель администратора</a>
                        </li>
                    @endif
                @endguest
            </ul>
        </div>
    </nav>
</header>

@yield('content')

<footer class="oleez-footer mt-4">
    <div class="container">
        <div class="footer-content">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('assets/images/logo-l.png') }}" alt="Tasty Finds" class="footer-logo" style="width: 150px">
                </div>
            </div>
        </div>
        <div class="footer-text">
            <p class="mb-md-0">© 2023, Tasty Finds.</p>
            <p class="mb-0">Все права защищены.</p>
        </div>
    </div>
</footer>

<script src="{{ asset('assets/vendors/popper.js/popper.min.js') }}"></script>
<script src="{{ asset('assets/vendors/wowjs/wow.min.js') }}"></script>
<script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendors/fancybox/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script>
    new WOW().init();
</script>
</body>


</html>
