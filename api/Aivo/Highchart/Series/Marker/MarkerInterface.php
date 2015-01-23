<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aivo\Highchart\Series\Marker;

use Aivo\Highchart\Series\SeriesInterface;
use Aivo\Highchart\Exception\InvalidArgumentException;

interface MarkerInterface
{

    const SYMBOL_CIRCLE = 'circle';
    const SYMBOL_SQUARE = 'square';
    const SYMBOL_DIAMOND = 'diamond';
    const SYMBOL_TRIANGLE = 'triangle';
    const SYMBOL_TRIANGLE_DOWN = 'triangle-down';

    /**
     * Gets the series.
     *
     * @return SeriesInterface Series.
     */
    public function getSeries();

    /**
     * Is enabled.
     *
     * @return bool `true` if enabled, otherwise `false.
     */
    public function isEnabled();

    /**
     * Whether the marker is enabled.
     *
     * @param bool $enabled `true` if enabled, otherwise `false`.
     *
     * @return self Reference to the marker.
     *
     * @throws InvalidArgumentException If an argument is invalid.
     */
    public function setEnabled($enabled = true);

    /**
     * Gets the fill color.
     *
     * @return string|null Fill color, if `null` if not set.
     */
    public function getFillColor();

    /**
     * Sets the fill color.
     *
     * @param string|null $fillColor Fill color, or `null` to remove the existing value.
     *
     * @return self Reference to the marker.
     */
    public function setFillColor($fillColor);

    /**
     * Gets the line color.
     *
     * @return string|null $lineColor Line color, or `null` if not set.
     */
    public function getLineColor();

    /**
     * Sets the line color.
     *
     * @param string|null $lineColor Line color, or `null` to remove the existing value.
     *
     * @return self Reference to the marker.
     */
    public function setLineColor($lineColor);

    /**
     * Gets the line width.
     *
     * @return int Line width.
     */
    public function getLineWidth();

    /**
     * Sets the line width.
     *
     * @param int $lineWidth Line width.
     *
     * @return self Reference to the marker.
     *
     * @throws InvalidArgumentException If an argument is invalid.
     */
    public function setLineWidth($lineWidth);

    /**
     * Gets the radius.
     *
     * @return int Radius.
     */
    public function getRadius();

    /**
     * Sets the radius.
     *
     * @param int $radius Radius.
     *
     * @return self Reference to the marker.
     *
     * @throws InvalidArgumentException If an argument is invalid.
     */
    public function setRadius($radius);

    /**
     * Gets the symbol.
     *
     * @return string|null Symbol, or `null` if not set.
     */
    public function getSymbol();

    /**
     * Sets the symbol.
     *
     * @param string|null $symbol Symbol, or `null` to remove the existing value.
     *
     * @return self Reference to the marker.
     */
    public function setSymbol($symbol);

}
