<?php

namespace Agenda\Providers;

use Agenda\Pessoa;
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
    public function boot()
    {
        view()->share('letras', Pessoa::getLetras());
    }
}
