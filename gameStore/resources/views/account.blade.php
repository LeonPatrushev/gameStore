@extends('layout')

@section('content')
<div class="main_content_grid">
    <div class="account_info_grid">
        <p>Логин:</p>
        <p>!Логин</p>
        <p>Email</p>
        <p>!Email</p>
    </div>
    <div class="product_managment_grid">
        <div class="tabs">
            <div class="tabs__nav">
                <a class="tabs__link tabs__link_active" href="#content-1">Редактировать слайдер</a>
                <a class="tabs__link" href="#content-2">Редактировать игры</a>
                <a class="tabs__link" href="#content-3">Добавить игру</a>
            </div>
            <div class="tabs__content">
                <div class="tabs__pane tabs__pane_show tabs_pane_min" id="content-1">
                    <div class="edit_favorite_products_grid">
                        <div class="edit_favorite_products_item">
                            @foreach($favorite_products as $favorite)
                            <form action="{{route('favorite_product.update')}}" method="POST" class="update_favorite_product_form">
                                @csrf
                                @method('PATCH')
                                <div class="favorite_products_item">
                                    <label>Номер слайда {{$favorite['id']}}</label>
                                    <select name="select_update_product">
                                        @foreach($all_products as $product)
                                        @if($product['id'] == $favorite['product_id'])
                                        <option value="{{$product['id']}}" selected>{{$product['name_product']}}</option>
                                        @else
                                        <option value="{{$product['id']}}">{{$product['name_product']}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <button type="submit" name="update_favorite_product_id" value="{{$favorite['id']}}">Сохранить</button>
                                </div>
                            </form>
                            @endforeach
                        </div>
                        <form action="{{route('favorite_product.delete')}}" method="POST" class="edit_favorite_products_item2 update_favorite_product_form">
                            @csrf
                            @method('DELETE')
                            @foreach($favorite_products as $favorite)
                            <button type="submit" name="favorite_product_id" value="{{$favorite['id']}}">Удалить</button>
                            @endforeach
                        </form>
                    </div>
                    <form action="{{route('favorite_product.store')}}" method="POST" class="add_favorite_product_grid">
                        @csrf
                        <div class="add_favorite_product_item">
                            <label>Новый слайд</label>
                            <select name="product_id">
                                @foreach($all_products as $product)
                                <option value="{{$product['id']}}">{{$product['name_product']}}</option>
                                @endforeach
                            </select>
                            <button type="submit">Добавить новый слайд</button>
                        </div>
                    </form>
                </div>
                <div class="tabs__pane tabs_pane_min" id="content-2">
                    <form action="{{route('products.select')}}" method="POST" class="edit_product_list_grid">
                        @csrf
                        @foreach($all_products as $product)
                        <div class="edit_product_list_item">
                            @include('layouts/product_card_list')
                            <button class="button_edit" type="submit" name="product_id" value="{{$product['id']}}">Изменить</button>
                        </div>
                        @endforeach
                    </form>
                </div>
                <div class="tabs__pane tabs_pane_min" id="content-3">
                    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form_item">
                            @error('product_img')
                            {{$message}}
                            @enderror
                            <label>Картинка игры</label>
                            <input type="file" name="product_img">
                        </div>

                        <div class="form_item">
                            @error('product_name')
                            {{$message}}
                            @enderror
                            <label>Название игры</label>
                            <input type="text" name="product_name" value="{{old('product_name')}}">
                        </div>

                        <div class="form_item">
                            @error('product_description')
                            {{$message}}
                            @enderror
                            <label>Описание</label>
                            <textarea name="product_description" cols="30" rows="10">{{old('product_description')}}</textarea>
                        </div>

                        <div class="form_item">
                            @error('product_old_price')
                            {{$message}}
                            @enderror
                            <label>Цена без скидки</label>
                            <input type="text" name="product_old_price" value="{{old('product_old_price')}}">
                        </div>

                        <div class="form_item">
                            @error('product_price')
                            {{$message}}
                            @enderror
                            <label>Цена</label>
                            <input type="text" name="product_price" value="{{old('product_price')}}">
                        </div>

                        <div class="form_item">
                            @error('product_release_date')
                            {{$message}}
                            @enderror
                            <label>Дата релиза</label>
                            <input type="date" name="product_release_date" value="{{old('product_release_date')}}">
                        </div>

                        <div class="form_item">
                            @error('product_availability')
                            {{$message}}
                            @enderror
                            <label>Наличие игры</label>
                            <select name="product_availability">
                                <option value="1" selected>В наличии</option>
                                <option value="0">Нет в наличии</option>
                            </select>
                        </div>

                        <div class="form_item">
                            @error('product_distributor')
                            {{$message}}
                            @enderror
                            <label>Выпускается в</label>
                            <select name="product_distributor">
                                @foreach($all_distributors as $distributor)
                                <option value="{{$distributor['id']}}">{{$distributor['name_distributor']}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form_item">
                            @error('product_genre')
                            {{$message}}
                            @enderror
                            <label>Жанр</label>
                            <select name="product_genre">
                                @foreach($all_genres as $genre)
                                <option value="{{$genre['id']}}">{{$genre['name_genre']}}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit">Добавить игру</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{URL::asset('storage/assets/js/tab.js')}}"></script>
@endsection