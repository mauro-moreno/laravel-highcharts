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
 * Pie-chart data point.
 *
 * @author Chris Wilkinson <chris wilkinson@admin.cam.ac.uk>
 */
interface PieDataPointInterface extends DataPointInterface
{

    /**
     * Whether the data point is sliced.
     *
     * @return bool `true` if sliced, otherwise `false.
     */
    public function isSliced();

    /**
     * Sets whether the data point is sliced.
     *
     * @param bool $sliced Whether the data point is to be sliced.
     *
     * @return self Reference to the data point.
     */
    public function setSliced($sliced = true);

}
