<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aivo\Highchart\Test\DataPoint;

use Aivo\Highchart\DataPoint\DataPoint;

class DataPointTest extends AbstractDataPointTest
{
    /**
     * @return DataPoint
     */
    protected function getDataPoint()
    {
        return new DataPoint();
    }

    public function testFactory()
    {
        $dataPoint = DataPoint::factory(null, null);

        $this->assertInstanceOf('Aivo\Highchart\DataPoint\DataPointInterface', $dataPoint);
        $this->assertNull($dataPoint->getXValue());
        $this->assertNull($dataPoint->getYValue());

        $dataPoint = DataPoint::factory(5, 10);

        $this->assertInstanceOf('Aivo\Highchart\DataPoint\DataPointInterface', $dataPoint);
        $this->assertSame(5, $dataPoint->getXValue());
        $this->assertSame(10, $dataPoint->getYValue());
    }
}
