# laravel-highcharts
This is a package for generating a Highchart JSON config.

Based in [PHP Highcharts](https://github.com/misd-service-development/php-highcharts).

Usage
-----

Create a chart:

    $chart = Chart::factory()
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