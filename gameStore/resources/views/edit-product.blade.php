@extends('layout')

@section('content')
<div class="main_content_grid">

    <form action="{{route('products.update')}}" method="POST" enctype="multipart/form-data">
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
            <input type="text" name="product_name" value="{{$select_product[0]['name_product']}}">
        </div>

        <div class="form_item">
            @error('product_description')
            {{$message}}
            @enderror
            <label>Описание</label>
            <textarea name="product_description" cols="30" rows="10">{{$select_product[0]['description']}}</textarea>
        </div>

        <div class="form_item">
            @error('product_old_price')
            {{$message}}
            @enderror
            <label>Цена без скидки</label>
            <input type="text" name="product_old_price" value="{{$select_product[0]['old_price']}}">
        </div>

        <div class="form_item">
            @error('product_price')
            {{$message}}
            @enderror
            <label>Цена</label>
            <input type="text" name="product_price" value="{{$select_product[0]['price']}}">
        </div>

        <div class="form_item">
            @error('product_release_date')
            {{$message}}
            @enderror
            <label>Дата релиза</label>
            <input type="date" name="product_release_date" value="{{$select_product[0]['release_date']}}">
        </div>

        <div class="form_item">
            @error('product_availability')
            {{$message}}
            @enderror
            <label>Наличие игры</label>
            <select name="product_availability">
                @if($select_product[0]['availability'] == 1)
                <option value="1" selected>В наличии</option>
                <option value="0">Нет в наличии</option>
                @else
                <option value="1">В наличии</option>
                <option value="0" selected>Нет в наличии</option>
                @endif
            </select>
        </div>

        <div class="form_item">
            @error('product_distributor')
            {{$message}}
            @enderror
            <label>Выпускается в</label>
            <select name="product_distributor">
                @foreach($all_distributors as $distributor)
                @if($select_product[0]['distributor_id'] == $distributor['id'])
                <option value="{{$distributor['id']}}" selected>{{$distributor['name_distributor']}}</option>
                @else
                <option value="{{$distributor['id']}}">{{$distributor['name_distributor']}}</option>
                @endif
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
                @if($select_product[0]['genre_id'] == $genre['id'])
                <option value="{{$genre['id']}}" selected>{{$genre['name_genre']}}</option>
                @else
                <option value="{{$genre['id']}}">{{$genre['name_genre']}}</option>
                @endif
                @endforeach
            </select>
        </div>

        <button type="submit" name="product_id" value="{{$select_product[0]['id']}}">Сохранить изменения</button>
    </form>
    <form action="{{route('products.delete')}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" name="product_id" value="{{$select_product[0]['id']}}" class="button_delete">Удалить игру</button>
    </form>
</div>
@endsection