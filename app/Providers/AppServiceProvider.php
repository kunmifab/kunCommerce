<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('*',function($view) {
            $categories = Category::all();
            $products = Product::all();
            $randomProducts = Product::inRandomOrder()->take(10)->get();
            $randomCategories = Category::inRandomOrder()->take(5)->get();
            $view->with('categories', $categories);
            $view->with('products', $products);
            $view->with('randomProducts', $randomProducts);
            $view->with('randomCategories', $randomCategories);
        });
    }
}


