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

use Aivo\Highchart\Series\ColumnSeries;

class ColumnSeriesTest extends AbstractStackableSeriesTest
{
    public function getSeries()
    {
        return new ColumnSeries();
    }

    public function testFactory()
    {
        $this->assertInstanceOf('Aivo\Highchart\Series\ColumnSeriesInterface', ColumnSeries::factory());
    }

    public function testHoverState()
    {
        $series = $this->getSeries();

        $this->assertInstanceOf('Aivo\Highchart\Series\State\SolidHoverStateInterface', $series->getHoverState());
    }
}
