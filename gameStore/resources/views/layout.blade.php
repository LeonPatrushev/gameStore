<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameStore</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <link href="{{URL::asset('storage/assets/css/main.css')}}" rel="stylesheet">
</head>

<body>

    <header>
        <div class="header_grid">
            <a href="{{route('index')}}" class="logo_grid">
                <img class="logo_image" src="{{URL::asset('storage/assets/img/joystick_game_3819.ico')}}" alt="Logo">
                GameStore
            </a>

            <a href="{{route('products.index')}}" class="boton1">Каталог</a>

            <a href="{{route('account')}}" class="boton1">Личный кабинет</a>

        </div>
        <div class="divine_line">
        </div>
    </header>

    <article>
        @yield('main_ad_banner')
    </article>

    <article>
        @yield('content')
    </article>

    <footer>
    <div class="divine_line">
        </div>
        <div class="footer_grid">
            <a href="{{route('index')}}" class="logo_grid">
                <img class="logo_image" src="{{URL::asset('storage/assets/img/joystick_game_3819.ico')}}" alt="Logo">
                GameStore
            </a>
            <p>Все упомянутые товарные знаки, названия игр и компаний, логотипы, материалы являются собственностью соответствующих владельцев.</p>
        </div>
    </footer>

    @yield('script')
</body>

</html>