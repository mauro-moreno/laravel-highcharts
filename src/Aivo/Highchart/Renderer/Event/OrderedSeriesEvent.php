<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aivo\Highchart\Renderer\Event;

use Aivo\Highchart\ChartInterface;
use Aivo\Highchart\Series\SeriesInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * Series have been ordered event.
 *
 * @author Chris Wilkinson <chris.wilkinson@admin.cam.ac.uk>
 */
class OrderedSeriesEvent extends Event
{

    /**
     * Chart being rendered.
     *
     * @var ChartInterface
     */
    public $chart;

    /**
     * Ordered series.
     *
     * @var SeriesInterface[]
     */
    public $series;

    /**
     * Constructor.
     *
     * @param ChartInterface    $chart  Chart being rendered.
     * @param SeriesInterface[] $series Ordered series.
     */
    public function __construct(ChartInterface $chart, array $series)
    {
        $this->chart = $chart;
        $this->series = $series;
    }

}
