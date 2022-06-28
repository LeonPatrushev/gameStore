<div class="product_card_list_grid">
    <div class="product_card_list_image_grid">
        <a class="product_card_list_link_grid" href="{{route('products.show',['id'=>$product['id']])}}">
            <img class="product_card_list_image" src="storage/assets/img/product/{{$product['image_product']}}" alt="{{$product['name_product']}}">
        </a>
    </div>
    <div class="product_card_list_discr_grid">
        <div class="discr_grid">
            <p>{{$product['name_product']}}</p>
            <div class="discr_grid_item">
                <img class="product_card_list_discr_img" src="storage/assets/img/distributors/{{$product['image_distributor']}}" alt="{{$product['name_distributor']}}">
                <p>{{$product['name_genre']}}</p>
            </div>
        </div>
    </div>
    <div class="product_card_list_buy_grid">
        <div class="discr_grid">
            <div class="discr_grid_item2">
                <p>{{$product['old_price']}}р</p>
            </div>
            <div class="discr_grid_item3">
                <p>{{$product['price']}}р</p>
            </div>
        </div>
    </div>
</div>