<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aivo\Highchart\DataPoint;

/**
 * Series data point.
 *
 * @author Chris Wilkinson <chris.wilkinson@admin.cam.ac.uk>
 */
class DataPoint extends AbstractDataPoint
{

    /**
     * Factory method.
     *
     * @param int|null $xValue Optional x-value.
     * @param int|null $yValue Optional y-value.
     *
     * @return DataPointInterface New data point.
     */
    public static function factory($xValue = null, $yValue = null)
    {
        $dataPoint = new self();

        $dataPoint
            ->setXValue($xValue)
            ->setYValue($yValue);

        return $dataPoint;
    }

}
