@extends('layout')

@section('main_ad_banner')
<div class="main_ad_banner_grid">
    <a class="main_ad_banner_link" href="{{route('products.show',['id'=>$main_ad_banner['product_id']])}}">
        <img class="main_ad_banner_image" src="storage/assets/img/ad_banner/main/{{$main_ad_banner['image_main_ad']}}" alt="{{$main_ad_banner['name_main_ad']}}">
    </a>
    <div class="section_name_grid">
        <div class="section_line"></div>
        <div class="section_name">
            <h3>Успей купить</h3>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="main_content_grid">

    <div class="product_promotions_grid">
        <div class="slider">
            @foreach($favorite_products as $product)
            @include('layouts/product_card')
            @endforeach
        </div>
    </div>

    <div class="ad_banner_grid">
        <a class="ad_banner_link" href="{{route('products.show',['id'=>$ad_banners[0]['product_id']])}}">
            <img class="ad_banner_image" src="storage/assets/img/ad_banner/other/{{$ad_banners[0]['image_ad']}}" alt="{{$ad_banners[0]['name_ad']}}">
        </a>
    </div>

    <div class="section_name_grid">
        <div class="section_line"></div>
        <div class="section_name">
            <h3>Категории</h3>
        </div>
    </div>

    <div class="preview_categories_grid">
        <div class="tabs">
            <div class="tabs__nav">
                <a class="tabs__link tabs__link_active" href="#content-1">Экшн</a>
                <a class="tabs__link" href="#content-2">Симулятор</a>
                <a class="tabs__link" href="#content-3">Преключения</a>
                <a class="tabs__link" href="#content-4">Стратегия</a>
            </div>
            <div class="tabs__content">
                <div class="tabs__pane tabs__pane_show" id="content-1">
                    <div class="tabs__pane_show_grid">
                        @foreach($preview_action_game as $product)
                        @include('layouts/product_card')
                        @endforeach
                    </div>
                </div>
                <div class="tabs__pane" id="content-2">
                    <div class="tabs__pane_show_grid">
                        @foreach($preview_simulator_game as $product)
                        @include('layouts/product_card')
                        @endforeach
                    </div>
                </div>
                <div class="tabs__pane" id="content-3">
                    <div class="tabs__pane_show_grid">
                        @foreach($preview_adventures_game as $product)
                        @include('layouts/product_card')
                        @endforeach
                    </div>
                </div>
                <div class="tabs__pane" id="content-4">
                    <div class="tabs__pane_show_grid">
                        @foreach($preview_strategy_game as $product)
                        @include('layouts/product_card')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ad_banner_grid">
        <a class="ad_banner_link" href="{{route('products.show',['id'=>$ad_banners[1]['product_id']])}}">
            <img class="ad_banner_image" src="storage/assets/img/ad_banner/other/{{$ad_banners[1]['image_ad']}}" alt="{{$ad_banners[1]['name_ad']}}">
        </a>
    </div>

    <div class="section_name_grid">
        <div class="section_line"></div>
        <div class="section_name">
            <h3>Немного про нас</h3>
        </div>
    </div>

    <div class="about_us_grid">
        <div class="description_grid">
            <h1>Для чего создан GameStore?</h1>
            <p>В нашем интернет-магазине вы сможете гарантированно приобрести ключи к играм от Steam, Uplay, Battle.net и прочих популярных игровых платформ. Наш магазин делает все для того, чтобы ваши покупки проходили быстро, с максимальным удобством и безопасностью, а цены оставались максимально доступными.</p>
        </div>
        <div class="advantages_grid">
            <div class="advantages_item">
                <h4 class="advatage_number">{{count($all_distributors)}}</h4>
                <p>Сервисов цифровой активации</p>
            </div>
            <div class="advantages_item">
                <h4 class="advatage_number">{{count($all_products)}}</h4>
                <p>Игр разных жанров</p>
            </div>
            <div class="advantages_item">
                <h4 class="advatage_number">24/7</h4>
                <p>Техническая поддержка покупателей</p>
            </div>
        </div>
    </div>

</div>
@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
<script src="storage/assets/js/slider.js"></script>
<script src="storage/assets/js/tab.js"></script>
@endsection