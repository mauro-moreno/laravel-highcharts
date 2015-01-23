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

use Aivo\Highchart\Series\State\SolidHoverStateInterface;

/**
 * Bar series.
 *
 * @author Chris Wilkinson <chris.wilkinson@admin.cam.ac.uk>
 */
interface BarSeriesInterface extends StackableSeriesInterface
{

    /**
     * {@inheritdoc}
     *
     * @return SolidHoverStateInterface Hover state.
     */
    public function getHoverState();

}
