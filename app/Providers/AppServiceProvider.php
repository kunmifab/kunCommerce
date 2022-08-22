<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Notification;
use App\Models\Product;
use GuzzleHttp\Psr7\Request;
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
            $newNotifications = Notification::where('status', 'new')->get();
            $searchword = request()->search;
            $view->with('categories', $categories);
            $view->with('products', $products);
            $view->with('randomProducts', $randomProducts);
            $view->with('randomCategories', $randomCategories);
            $view->with('newNotifications', $newNotifications);
            $view->with('searchword', $searchword);
        });
    }
}


