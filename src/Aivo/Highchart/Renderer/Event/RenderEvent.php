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
use Symfony\Component\EventDispatcher\Event;

/**
 * Rendering a chart event.
 *
 * @author Chris Wilkinson <chris.wilkinson@admin.cam.ac.uk>
 */
class RenderEvent extends Event
{

    /**
     * Chart being rendered.
     *
     * @var ChartInterface
     */
    public $chart;

    /**
     * Constructor.
     *
     * @param ChartInterface $chart Chart being rendered.
     */
    public function __construct(ChartInterface $chart)
    {
        $this->chart = $chart;
    }

}
