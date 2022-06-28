@extends('layout')
@section('content')
<div class="main_content_grid">
    <!-- <div class="filter_grid">

    </div> -->
    <div class="catalog_list_grid">
        @foreach($all_products as $product)
        <div class="catalog_product_list_grid">
            @include('layouts/product_card_list')
        </div>
        @endforeach
    </div>
</div>
@endsection