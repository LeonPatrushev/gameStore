<?php

namespace App\Http\Controllers;

use App\Models\AdBanner;
use App\Models\Distributor;
use App\Models\FavoriteProduct;
use App\Models\Genre;
use App\Models\MainAdBanner;
use App\Models\Product;

class MainController extends Controller
{
    public function index()
    {

        $main_ad_banner = MainAdBanner::orderBy(MainAdBanner::raw('RAND()'))->take(1)->first();
        $ad_banners = AdBanner::orderBy(AdBanner::raw('RAND()'))->take(2)->get();

        $preview_action_game = Product::where('genre_id', '1')->join('distributors', 'distributors.id', '=', 'products.distributor_id')->take(9)->get(['products.*', 'distributors.image_distributor']);
        $preview_simulator_game = Product::where('genre_id', '2')->join('distributors', 'distributors.id', '=', 'products.distributor_id')->take(9)->get(['products.*', 'distributors.image_distributor']);
        $preview_adventures_game = Product::where('genre_id', '3')->join('distributors', 'distributors.id', '=', 'products.distributor_id')->take(9)->get(['products.*', 'distributors.image_distributor']);
        $preview_strategy_game = Product::where('genre_id', '4')->join('distributors', 'distributors.id', '=', 'products.distributor_id')->take(9)->get(['products.*', 'distributors.image_distributor']);

        $all_products = Product::get();
        $all_distributors = Distributor::get();

        $favorite_products = FavoriteProduct::join('products', 'products.id', '=', 'favorite_products.product_id')->join('distributors', 'distributors.id', '=', 'products.distributor_id')->get(['products.*', 'distributors.image_distributor']);

        return view('index', [
            'main_ad_banner' => $main_ad_banner,
            'ad_banners' => $ad_banners,

            'preview_action_game' => $preview_action_game,
            'preview_simulator_game' => $preview_simulator_game,
            'preview_adventures_game' => $preview_adventures_game,
            'preview_strategy_game' => $preview_strategy_game,

            'all_products' => $all_products,
            'all_distributors' => $all_distributors,

            'favorite_products' => $favorite_products
        ]);
    }

    public function account()
    {
        $all_products = Product::join('genres', 'genres.id','=','products.genre_id')->join('distributors', 'distributors.id', '=', 'products.distributor_id')->get(['products.*', 'distributors.image_distributor', 'genres.name_genre']);
        $favorite_products = FavoriteProduct::get();
        $all_distributors = Distributor::get();
        $all_genres = Genre::get();
        return view('account', [
            'all_products' => $all_products,
            'favorite_products' => $favorite_products,
            'all_distributors' => $all_distributors,
            'all_genres' => $all_genres
        ]);
    }

    
}
