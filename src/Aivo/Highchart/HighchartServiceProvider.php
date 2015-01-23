<?php

namespace Aivo\Highchart;

use Illuminate\Support\ServiceProvider;

class HighchartServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind('highchart', function($app) {
            return Chart::factory();
        });
    }

}
