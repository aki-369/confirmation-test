<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate - @yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}" />
    <link rel="stylesheet" href="{{asset('css/common.css')}}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header__logo @if(!request()->is('/')) header__logo--with-button @endif">
                <a class="header__logo-title">
                    FashionablyLate
                </a>
            </div>
            <div class="header-nav">
                @if (Auth::check())
                    <form action="/logout" method="post">
                    @csrf
                        <button class="header-nav__button">logout</button>
                    </form>
                @elseif (request()->is('/'))
                    {{-- Do nothing, show nothing --}}
                @elseif(request()->is('login'))
                    <form action="/register" method="get">
                        @csrf
                        <button class="header-nav__button">register</button>
                    </form>
                @elseif(request()->is('register'))
                    <form action="/login" method="get">
                        @csrf
                        <button class="header-nav__button">login</button>
                    </form>
                @endif
            </div>
        </div>
    </header> 
    <main>
        @yield('content')
    </main>
</body>

</html>