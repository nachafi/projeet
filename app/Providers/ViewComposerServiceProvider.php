<?php

namespace App\Providers;

use Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\ProductAttribute;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('site.partials.nav', function ($view) {
            $view->with('categories', Category::orderByRaw('-name ASC')->get()->nest());
        });
        View::composer('site.partials.header', function ($view) {
            $view->with('cartCount', Cart::getContent()->count());
        });
        View::composer('site.pages.homepage', function ($view) {
            $view->with('products', Product::orderBy('id', 'desc')->get());
        });
        View::composer('site.pages.homepage', function ($view) {
            $view->with('featured', Product::where('featured', '1')->orderBy('created_at')->take('8')->inRandomOrder()->get());
        });
        View::composer('site.pages.products', function ($view) {
            $view->with('categories', Category::orderByRaw('-name ASC')->get());
        });
        View::composer('site.pages.products', function ($view) {
            $view->with('brands', Brand::orderByRaw('-name ASC')->get());
        });
        
        View::composer('site.pages.products', function ($view) {
            $view->with('attributes', Attribute::where('is_filterable', '1')->orderByRaw('-name ASC')->get());
        });
        View::composer('site.pages.products', function ($view) {
            $view->with('attribute_values', AttributeValue::orderByRaw('-id ASC')->get());
        });
  
  
  
      
       
       
       
   
    }
}
