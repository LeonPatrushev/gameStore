<?php

namespace App\Http\Controllers;

use App\Models\FavoriteProduct;
use Illuminate\Http\Request;

class FavoriteProductController extends Controller
{
    public function store(){
        $favorite_product = new FavoriteProduct();
        $favorite_product -> product_id = request('product_id');
        $favorite_product -> save();
        return redirect('account');
    }

    public function update(Request $request){
        $favorite_product = FavoriteProduct::find($request->input('update_favorite_product_id'));
        $favorite_product -> product_id = $request->input('select_update_product');
        $favorite_product -> save();
        return redirect('account');
    }

    public function delete(Request $request){
        FavoriteProduct::find($request->input('favorite_product_id'))->delete();
        return redirect('account');
    }
}
