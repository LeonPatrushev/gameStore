@extends('layout')

@section('content')
<div class="main_content_grid">
    <div class="product_grid">
        <div class="product_info_grid">
            <div class="product_info_item">
                <h3 class="product_name">{{$array_select_product[0]['name_product']}}</h3>
                <img class="product_img" src="{{URL::asset('storage/assets/img/product/'.$array_select_product[0]['image_product'].'')}}" alt="{{$array_select_product[0]['name_product']}}">
            </div>
            <div class="product_info_item_two">
                <div class="product_info_price">
                    <p class="product_info_old_price">{{$array_select_product[0]['old_price']}}р</p>
                    <p class="bold_text">{{$array_select_product[0]['price']}}р</p>
                </div>
                <button>Купить</button>
                <img class="product_distr_img" src="{{URL::asset('storage/assets/img/distributors/'.$array_select_product[0]['image_distributor'].'')}}" alt="{{$array_select_product[0]['name_distributor']}}">
                <div class="product_info_price">
                    <p class="bold_text">Жанр</p>
                    <p>{{$array_select_product[0]['name_genre']}}</p>
                </div>
                <div class="product_info_price">
                    <p class="bold_text">Дата выхода</p>
                    <p>{{$array_select_product[0]['release_date']}}</p>
                </div>
            </div>
        </div>
        <div class="product_discr_grid">
            <h3>Описание</h3>
            <p>{{$array_select_product[0]['description']}}</p>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
<script src="{{URL::asset('storage/assets/js/slider.js')}}"></script>
@endsection