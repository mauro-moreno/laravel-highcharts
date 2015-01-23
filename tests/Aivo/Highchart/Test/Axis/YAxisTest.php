<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aivo\Highchart\Test\Axis;

use Aivo\Highchart\Axis\YAxis;

class YAxisTest extends AbstractAxisTest
{
    /**
     * @return YAxis
     */
    protected function getAxis()
    {
        return new YAxis();
    }

    public function testFactory()
    {
        $this->assertInstanceOf('Aivo\Highchart\Axis\YAxisInterface', YAxis::factory());
    }
}
