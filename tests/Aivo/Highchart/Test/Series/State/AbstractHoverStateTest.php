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

use Aivo\Highchart\Series\State\AbstractHoverState;

class AbstractHoverStateTest extends AbstractStateTest
{
    /**
     * @return AbstractHoverState
     */
    protected function createState()
    {
        return $this->getMockForAbstractClass(
            'Aivo\Highchart\Series\State\AbstractHoverState',
            array($this->mockSeries)
        );
    }
}
