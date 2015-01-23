<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aivo\Highchart\Series;

class SplineSeries extends AbstractSequentialSeries
    implements SplineSeriesInterface
{

    /**
     * Factory method.
     *
     * @return SplineSeriesInterface New spline series.
     */
    public static function factory()
    {
        return new self();
    }

}
