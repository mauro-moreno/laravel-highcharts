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

/**
 * Area chart series.
 *
 * @author Chris Wilkinson <chris.wilkinson@admin.cam.ac.uk>
 */
class AreaSeries extends AbstractStackableSeries implements AreaSeriesInterface
{

    /**
     * Factory method.
     *
     * @return AreaSeriesInterface New area series.
     */
    public static function factory()
    {
        return new self();
    }

}
