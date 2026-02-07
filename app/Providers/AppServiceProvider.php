<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $cartCount = 0;

            if (auth()->check()) {
                $cart = Cart::where('user_id', auth()->id())->first();

                if ($cart) {
                    $cartCount = $cart->items()->sum('qty');
                }
            }

            $view->with('cartCount', $cartCount);
        });
    }
}
