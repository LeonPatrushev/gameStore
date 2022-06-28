<div class="product_card_grid">
    <a class="product_card_link" href="{{route('products.show',['id'=>$product['id']])}}">
    <div class="product_card_image_grid">
        <img class="product_card_image" src="storage/assets/img/product/{{$product['image_product']}}" alt="{{$product['name_product']}}">
    </div>
    <div class="dividing_line"></div>
    <div class="product_card_bar_grid">
        <img class="product_card_image_distributor" src="storage/assets/img/distributors/{{$product['image_distributor']}}" alt="{{$product['name_distributor']}}">
        <div class="product_card_price_info">
            <div class="product_card_price_info_old_item">
                <p class="product_card_old_price">{{$product['old_price']}}р</p>
            </div>
            <div class="product_card_price_info_item">
                <p class="product_card_price">{{$product['price']}}р</p>
            </div>
        </div>
    </div>
    </a>
</div>