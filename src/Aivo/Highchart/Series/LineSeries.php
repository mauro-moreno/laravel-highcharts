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

class LineSeries extends AbstractSequentialSeries implements LineSeriesInterface
{

    /**
     * Factory method.
     *
     * @return LineSeriesInterface New line series.
     */
    public static function factory()
    {
        return new self();
    }

}
