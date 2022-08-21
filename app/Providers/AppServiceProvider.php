<?php

namespace App\Providers;

use App\Models\ProductCategory;
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
        config([
			'laravellocalization.supportedLocales' => [
				'ar' => array( 'name' => 'Arabic', 'script' => 'Latn', 'native' => 'Arabic' ),

				'en'  => array( 'name' => 'English', 'script' => 'Latn', 'native' => 'English' ),
			],

			'laravellocalization.useAcceptLanguageHeader' => true,

			// 'laravellocalization.hideDefaultLocaleInURL' => true
		]);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view) {
            $view->with('product_catgegories', ProductCategory::where('active', 1)->orderBy('id', 'desc')->get());

        });
    }
}
