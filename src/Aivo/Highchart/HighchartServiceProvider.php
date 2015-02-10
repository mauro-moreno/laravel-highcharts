<?php
/**
 * Highchart Service Provider for Laravel
 *
 * @author Mauro Moreno <mmoreno@aivo.co>
 */
namespace Aivo\Highchart;

use Illuminate\Support\ServiceProvider;

/**
 * HighchartServiceProvider extends ServiceProvider
 *
 */
class HighchartServiceProvider extends ServiceProvider
{

    /**
     * Register function used for Service Provider in Laravel
     *
     * @return Chart
     */
    public function register()
    {
        $this->app->bind('highchart', function($app) {
            return Chart::factory();
        });
    }

}
