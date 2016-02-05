# laravel-highcharts
This is a package for generating a Highchart JSON config.

Based in [PHP Highcharts](https://github.com/misd-service-development/php-highcharts).

## Installation

Run the following command and provide the latest stable version (e.g v2.4.15) :

```bash
composer require mauro-moreno/laravel-highcharts
```

or add the following to your `composer.json` file :

```json
"mauro-moreno/laravel-highcharts": "^1.0.0"
```

Then register this service provider with Laravel :

```php
'providers' => [
    ...
    Aivo\Highchart\HighchartServiceProvider::class,
    ...
]
```

Usage
-----

Create a chart:

    $chart = App::make('highchart')
        ->setTitle('Scatter plot with regression line')
        ->addSeries(
            array(
                ScatterSeries::factory()
                    ->setName('Observations')
                    ->addData(array(1, 1.5, 2.8, 3.5, 3.9, 4.2)),
                LineSeries::factory()
                    ->setName('Regression line')
                    ->addDataPoint(DataPoint::factory(0, 1.11))
                    ->addDataPoint(DataPoint::factory(5, 4.51))
                    ->getMarker()->setEnabled(false)->getSeries()
                    ->setEnableMouseTracking(false),
            )
        )
    ;
    $chart->render();
