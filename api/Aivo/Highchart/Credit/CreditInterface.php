<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aivo\Highchart\Credit;

use Aivo\Highchart\ChartInterface;
use Aivo\Highchart\Exception\InvalidArgumentException;
use Aivo\Highchart\StyleableInterface;

/**
 * Chart credits.
 *
 * @author Chris Wilkinson <chris.wilkinson@admin.cam.ac.uk>
 */
interface CreditInterface extends StyleableInterface
{

    /**
     * Gets the chart.
     *
     * @return ChartInterface Chart.
     */
    public function getChart();

    /**
     * Whether the credits are enabled.
     *
     * @return bool `true` if enabled, otherwise `false`.
     */
    public function isEnabled();

    /**
     * Sets whether the credits are enabled.
     *
     * @param bool $enabled `true` if enabled, otherwise `false`.
     *
     * @return self Reference to the credits.
     *
     * @throws InvalidArgumentException If an argument is invalid.
     */
    public function setEnabled($enabled = true);

    /**
     * Gets the text.
     *
     * @return string|null String, or `null` if not set.
     */
    public function getText();

    /**
     * Sets the text.
     *
     * @param string|null $text Text, or `null` to remove the existing value.
     *
     * @return self Reference to the credits.
     */
    public function setText($text);

    /**
     * Gets the URL.
     *
     * @return string|null URL, or `null` if not set.
     */
    public function getUrl();

    /**
     * Sets the URL.
     *
     * @param string|null $url URL, or `null` to remove the existing value.
     *
     * @return self Reference to the credits.
     */
    public function setUrl($url);

    /**
     * Gets the horizontal alignment.
     *
     * @return string|null Horizontal alignment, or null if not set.
     */
    public function getHorizontalAlignment();

    /**
     * Sets the horizontal alignment.
     *
     * @param string|null $horizontalAlignment Horizontal alignment, or `null` to remove the existing value.
     *
     * @return self Reference to the credits.
     */
    public function setHorizontalAlignment($horizontalAlignment);

    /**
     * Gets the vertical alignment.
     *
     * @return string|null Vertical alignment, or null if not set.
     */
    public function getVerticalAlignment();

    /**
     * Sets the vertical alignment.
     *
     * @param string|null $verticalAlignment Vertical alignment, or `null` to remove the existing value.
     *
     * @return self Reference to the credits.
     */
    public function setVerticalAlignment($verticalAlignment);

    /**
     * Gets the x-position.
     *
     * @return int|null X-position, or null if not set.
     */
    public function getXPosition();

    /**
     * Sets the x-position.
     *
     * @param int|null $xPosition X-position, or `null` to remove the existing value.
     *
     * @return self Reference to the credits.
     */
    public function setXPosition($xPosition);

    /**
     * Gets the y-position.
     *
     * @return int|null Y-position, or null if not set.
     */
    public function getYPosition();

    /**
     * Sets the y-position.
     *
     * @param int|null $yPosition Y-position, or `null` to remove the existing value.
     *
     * @return self Reference to the credits.
     */
    public function setYPosition($yPosition);

}
