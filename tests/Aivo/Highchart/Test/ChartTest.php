<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aivo\Highchart\Test;

use Aivo\Highchart\Chart;

class ChartTest extends AbstractChartTest
{
    /**
     * @return Chart
     */
    protected function createChart()
    {
        return new Chart();
    }

    public function testFactory()
    {
        $this->assertInstanceOf('Aivo\Highchart\ChartInterface', Chart::factory());
    }

}
