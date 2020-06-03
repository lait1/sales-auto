<?php

namespace App\Providers;

use App\Brand;
use App\Category;
use App\City;
use App\Status;
use App\Type;
use Illuminate\Support\Carbon;
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
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        setlocale(LC_ALL, 'ru_RU');
        Carbon::setLocale('ru');
        view()->composer('_header', function ($view){
            $view->with('categories',  Category::all());
        });
        view()->composer('_filter', function ($view){
            $view->with('categories',  Category::all());
            $view->with('cities',  City::all());
            $view->with('status',  Status::all());
            $view->with('brands',  Brand::all());
        });
        view()->composer('_filterAll', function ($view){
            $view->with('categories',  Category::all());
            $view->with('cities',  City::all());
            $view->with('status',  Status::all());
            $view->with('types',  Type::getCurrentType());
            $view->with('category',  Category::getCurrentCategory());
        });
    }
}
