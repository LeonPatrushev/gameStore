<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductEditRequest;
use App\Models\Distributor;
use App\Models\Genre;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $all_products = Product::where('products.availability', '=', '1')->join('distributors', 'distributors.id', '=', 'products.distributor_id')->join('genres', 'genres.id', '=', 'products.genre_id')->get(['products.*', 'distributors.image_distributor','distributors.name_distributor', 'genres.name_genre']);
        return view('catalog', [
            'all_products' => $all_products
        ]);
    }

    public function show($id)
    {
        $array_select_product = Product::where('products.id', '=', $id)->join('distributors', 'distributors.id', '=', 'products.distributor_id')->join('genres', 'genres.id', '=', 'products.genre_id')->get(['products.*', 'distributors.image_distributor','distributors.name_distributor', 'genres.name_genre']);
        return view('product', [
            'array_select_product' => $array_select_product
        ]);
    }

    public function select(Request $request)
    {
        $id = $request->input('product_id');
        $select_product = Product::where('products.id', '=', $id)->join('distributors', 'distributors.id', '=', 'products.distributor_id')->join('genres', 'genres.id', '=', 'products.genre_id')->get(['products.*', 'distributors.image_distributor','distributors.name_distributor', 'genres.name_genre']);
        $all_distributors = Distributor::get();
        $all_genres = Genre::get();
        return view('edit-product', [
            'select_product' => $select_product,
            'all_distributors' => $all_distributors,
            'all_genres' => $all_genres
        ]);
    }

    public function update(Request $request)
    {
        $product = Product::find($request->input('product_id'));
        $product->name_product = $request->input('product_name');
        $product->description = $request->input('product_description');
        if ($request->hasFile('product_img')) {
            $img = $request->file('product_img');
            $path = $img->store('');
            $product->image_product = $path;
        }
        $product->old_price = $request->input('product_old_price');
        $product->price = $request->input('product_price');
        $product->release_date = $request->input('product_release_date');
        $product->availability = $request->input('product_availability');
        $product->genre_id = $request->input('product_genre');
        $product->distributor_id = $request->input('product_distributor');
        $product->save();
        return redirect('account');
    }

    public function store(ProductEditRequest $request)
    {
        $product = new Product();
        $product->name_product = $request->input('product_name');
        $product->description = $request->input('product_description');
        $img = $request->file('product_img');
        $path = $img->store('');
        $product->image_product = $path;
        $product->old_price = $request->input('product_old_price');
        $product->price = $request->input('product_price');
        $product->release_date = $request->input('product_release_date');
        $product->availability = $request->input('product_availability');
        $product->genre_id = $request->input('product_genre');
        $product->distributor_id = $request->input('product_distributor');
        $product->save();
        return back()->withInput();
    }

    public function delete(Request $request){
        
        Product::find($request->input('product_id'))->delete();
        return redirect('account');
    }
}
