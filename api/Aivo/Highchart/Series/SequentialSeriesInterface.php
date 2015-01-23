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

use Aivo\Highchart\Exception\InvalidArgumentException;

/**
 * Sequential series.
 *
 * Do not implement this interface directly.
 *
 * @author Chris Wilkinson <chris.wilkinson@admin.cam.ac.uk>
 */
interface SequentialSeriesInterface extends SeriesInterface
{

    /**
     * Gets point start.
     *
     * @return int|null Point start, or null if not set.
     */
    public function getPointStart();

    /**
     * Sets point start.
     *
     * @param int|null $pointStart Point start, or null if not set.
     *
     * @return self Reference to the series.
     *
     * @throws InvalidArgumentException If an argument is invalid.
     */
    public function setPointStart($pointStart);

}
