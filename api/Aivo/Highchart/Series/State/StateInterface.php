<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aivo\Highchart\Series\State;

use Aivo\Highchart\Exception\InvalidArgumentException;
use Aivo\Highchart\Series\Marker\MarkerInterface;
use Aivo\Highchart\Series\SeriesInterface;

/**
 * Series state.
 *
 * @author Chris Wilkinson <chris.wilkinson@admin.cam.ac.uk>
 */
interface StateInterface
{

    /**
     * Gets the series.
     *
     * @return SeriesInterface Series.
     */
    public function getSeries();

    /**
     * Is enabled.
     *
     * @return bool `true` if enabled, otherwise `false`.
     */
    public function isEnabled();

    /**
     * Sets whether the state is enabled.
     *
     * @param bool $enabled `true` if enabled, otherwise `false`.
     *
     * @return self Reference to the state.
     *
     * @throws InvalidArgumentException If an argument is invalid.
     */
    public function setEnabled($enabled = true);

    /**
     * Gets the line width.
     *
     * @return mixed
     */
    public function getLineWidth();

    /**
     * Sets the line width.
     *
     * @param int|null $lineWidth Line width, or `null` to remove the existing value.
     *
     * @return self Reference to the state.
     *
     * @throws InvalidArgumentException If an argument is invalid.
     */
    public function setLineWidth($lineWidth);

    /**
     * Gets the marker.
     *
     * @return MarkerInterface Marker.
     */
    public function getMarker();

}
