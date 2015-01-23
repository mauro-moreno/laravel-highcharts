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

use Aivo\Highchart\DataPoint\PieDataPoint;

class PieDataPointTest extends AbstractDataPointTest
{
    /**
     * @return PieDataPoint
     */
    protected function getDataPoint()
    {
        return new PieDataPoint();
    }

    public function testFactory()
    {
        $this->assertInstanceOf('Aivo\Highchart\DataPoint\PieDataPointInterface', PieDataPoint::factory());
    }

    public function testSliced()
    {
        $dataPoint = new PieDataPoint();

        $this->assertFalse($dataPoint->isSliced());
        $this->assertSame($dataPoint, $dataPoint->setSliced(true));
        $this->assertTrue($dataPoint->isSliced());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testSlicedInvalidArgumentException()
    {
        $dataPoint = new PieDataPoint();

        $dataPoint->setSliced(null);
    }
}
