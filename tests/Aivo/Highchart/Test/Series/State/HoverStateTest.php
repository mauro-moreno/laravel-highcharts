<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aivo\Highchart\Test\Series\State;

use Aivo\Highchart\Series\State\HoverState;

class HoverStateTest extends AbstractHoverStateTest
{
    /**
     * @return HoverState
     */
    protected function createState()
    {
        return new HoverState($this->mockSeries);
    }
}
