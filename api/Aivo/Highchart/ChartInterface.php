<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aivo\Highchart;

use Aivo\Highchart\Axis\XAxisInterface;
use Aivo\Highchart\Axis\YAxisInterface;
use Aivo\Highchart\Credit\CreditInterface;
use Aivo\Highchart\Series\SeriesInterface;
use Aivo\Highchart\Tooltip\TooltipInterface;
use Aivo\Highchart\Exception\InvalidArgumentException;

/**
 * Chart interface.
 *
 * @author Chris Wilkinson <chris.wilkinson@admin.cam.ac.uk>
 */
interface ChartInterface
{

    /**
     * Gets the chart title.
     *
     * @return string|null Title, or `null` if not set.
     */
    public function getTitle();

    /**
     * Sets the chart title.
     *
     * @param string|null $title Chart title, or `null` to remove the existing value.
     *
     * @return self Reference to the chart.
     */
    public function setTitle($title);

    /**
     * Gets the chart title align
     *
     * @return string|null Title Align, or `null` if not set.
     */
    public function getTitleAlign();

    /**
     * Sets the chart title align.
     *
     * @param string|null $titleAlign Chart title Align,
     * or `null` to remove the existing value.
     *
     * @return self Reference to the chart.
     */
    public function setTitleAlign($titleAlign = null);

    /**
     * Gets the chart title vertical align
     *
     * @return string|null Title Vertical Align, or `null` if not set.
     */
    public function getTitleVAlign();

    /**
     * Sets the chart title vertical align.
     *
     * @param string|null $titleVAlign Chart title vertical align,
     * or `null` to remove the existing value.
     *
     * @return self Reference to the chart.
     */
    public function setTitleVAlign($titleVAlign = null);

    /**
     * Gets the chart title Y
     *
     * @return string|null Title Y, or `null` if not set.
     */
    public function getTitleY();

    /**
     * Sets the chart title Y.
     *
     * @param string|null $titleY Chart title y,
     * or `null` to remove the existing value.
     *
     * @return self Reference to the chart.
     */
    public function setTitleY($titleY);

    /**
     * Gets the chart subtitle;
     *
     * @return string|null Subtitle.
     */
    public function getSubtitle();

    /**
     * Sets the chart subtitle.
     *
     * @param string|null $subtitle Subtitle, or `null` to remove the existing value.
     *
     * @return self Reference to the chart.
     */
    public function setSubtitle($subtitle);

    /**
     * Adds an x-axis.
     *
     * @param XAxisInterface $xAxis X-axis.
     *
     * @return self Reference to the chart.
     */
    public function addXAxis(XAxisInterface $xAxis);

    /**
     * Gets the x-axes.
     *
     * @return XAxisInterface[] X-axis.
     */
    public function getXAxes();

    /**
     * Gets an x-axis.
     *
     * @param int $key Key.
     *
     * @return XAxisInterface|null X-axis, or null if not found.
     */
    public function getXAxis($key);

    /**
     * Adds a y-axis.
     *
     * @param YAxisInterface $yAxis Y-axis.
     *
     * @return self Reference to the chart.
     */
    public function addYAxis(YAxisInterface $yAxis);

    /**
     * Gets the y-axes.
     *
     * @return YAxisInterface[] Y-axis.
     */
    public function getYAxes();

    /**
     * Gets a y-axis.
     *
     * @param int $key Key.
     *
     * @return YAxisInterface|null Y-axis, or null if not found.
     */
    public function getYAxis($key);

    /**
     * Adds a series.
     *
     * @param SeriesInterface|SeriesInterface[] $series Series, array of series.
     *
     * @return self Reference to the chart.
     *
     * @throws InvalidArgumentException If an argument is invalid.
     */
    public function addSeries($series);

    /**
     * Gets the series.
     *
     * @return SeriesInterface[] Series.
     */
    public function getSeries();

    /**
     * Remove all the series.
     *
     * @return self Reference to the chart.
     */
    public function clearSeries();

    /**
     * @return bool
     */
    public function hasLegend();

    /**
     * @param bool $legend
     *
     * @return self Reference to the chart.
     */
    public function setLegend($legend = true);

    /**
     * Gets the tooltip.
     *
     * @return TooltipInterface Tooltip.
     */
    public function getTooltip();

    /**
     * Gets the credits.
     *
     * @return CreditInterface Credit.
     */
    public function getCredit();

    /**
     * Gets the extra.
     *
     * @return string|null Extra, or `null` if not set.
     */
    public function getExtra();

    /**
     * Sets the chart extra data.
     *
     * @param string|null $extra Chart extra data, or `null`.
     *
     * @return self Reference to the chart.
     */
    public function setExtra($extra);

}
