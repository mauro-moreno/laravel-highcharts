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

use Aivo\Highchart\Exception\InvalidArgumentException;

/**
 * Series data point.
 *
 * @author Chris Wilkinson <chris.wilkinson@admin.cam.ac.uk>
 */
interface DataPointInterface
{

    /**
     * Gets the data point name.
     *
     * @return string|null Data point name, or `null` if not set.
     */
    public function getName();

    /**
     * Sets the data point name.
     *
     * @param string $name name.
     *
     * @return self Reference to the data point.
     */
    public function setName($name);

    /**
     * Gets the x-value.
     *
     * @return int|float|null X-Value, or `null` if not set.
     */
    public function getXValue();

    /**
     * Sets the x-value.
     *
     * @param int|float|null $xValue X-value, or `null` to remove a set value.
     *
     * @return self Reference to the data point.
     *
     * @throws InvalidArgumentException If an argument is invalid.
     */
    public function setXValue($xValue);

    /**
     * Gets the y-value.
     *
     * @return int|float|null Y-Value, or `null` if not set.
     */
    public function getYValue();

    /**
     * Sets the y-value.
     *
     * @param int|float|null $yValue Y-value, or `null` to remove a set value.
     *
     * @return self Reference to the data point.
     *
     * @throws InvalidArgumentException If an argument is invalid.
     */
    public function setYValue($yValue);

    /**
     * Gets the color.
     *
     * @return string color, or `null` if not set.
     */
    public function getColor();

    /**
     * Sets the color.
     *
     * @param string $color or `null` to remove a set value.
     *
     * @return self Reference to the data point.
     */
    public function setColor($color);

}
