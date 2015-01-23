<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aivo\Highchart\Test\Series;

use Aivo\Highchart\Series\AreaSeries;

class AreaSeriesTest extends AbstractStackableSeriesTest
{
    public function getSeries()
    {
        return new AreaSeries();
    }

    public function testFactory()
    {
        $this->assertInstanceOf('Aivo\Highchart\Series\AreaSeriesInterface', AreaSeries::factory());
    }
}
