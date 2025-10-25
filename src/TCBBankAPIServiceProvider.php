<?php

namespace Quicksoftapp\TCBBankAPI;

use Illuminate\Support\ServiceProvider;
use Quicksoftapp\TCBBankAPI\Services\TCBBankAPIClient;

class TCBBankAPIServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/Config/tcb-bank.php', 'tcb-bank');
        $this->app->singleton('tcb-bank', function () {
            return new TCBBankAPIClient();
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/Config/tcb-bank.php' => config_path('tcb-bank.php'),
        ], 'config');
    }
}
