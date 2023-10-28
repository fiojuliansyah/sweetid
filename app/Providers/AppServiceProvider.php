<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Channels\WhatsappChannel;
use Illuminate\Support\Facades\Notification;

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
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');

        Blade::directive('currency', function ( $expression ) 
        { return "Rp. <?php echo number_format($expression,0,',','.'); ?>"; });

        Notification::extend('whatsapp', function ($app) {
            return new WhatsappChannel();
        });
    }
}
