<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aivo\Highchart\Renderer;

use Aivo\Highchart\ChartInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

interface RendererInterface
{

    /**
     * Gets the event dispatcher.
     *
     * @return EventDispatcherInterface|null Event dispatcher, or `null` if not set.
     */
    public function getDispatcher();

    /**
     * Sets the event dispatcher.
     *
     * @param EventDispatcherInterface $dispatcher Event dispatcher.
     */
    public function setDispatcher(EventDispatcherInterface $dispatcher);

    /**
     * @param ChartInterface $chart
     *
     * @return string
     */
    public function render(ChartInterface $chart);
}
