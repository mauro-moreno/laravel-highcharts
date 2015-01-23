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

use Aivo\Highchart\Series\SplineSeries;

class SplineSeriesTest extends AbstractSeriesTest
{
    public function getSeries()
    {
        return new SplineSeries();
    }

    public function testFactory()
    {
        $this->assertInstanceOf('Aivo\Highchart\Series\SplineSeriesInterface', SplineSeries::factory());
    }
}
