<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aivo\Highchart\Tooltip;

use Aivo\Highchart\ChartInterface;
use Aivo\Highchart\StyleableInterface;

interface TooltipInterface extends StyleableInterface
{

    /**
     * Gets the chart.
     *
     * @return ChartInterface Chart.
     */
    public function getChart();

    /**
     * Whether the tooltip is enabled.
     *
     * @return bool `true` if enabled, otherwise `false`.
     */
    public function isEnabled();

    /**
     * Sets whether the tooltip is enabled.
     *
     * @param bool $enabled `true` if enabled, otherwise `false`.
     *
     * @return self Reference to the tooltip.
     */
    public function setEnabled($enabled = true);

}
