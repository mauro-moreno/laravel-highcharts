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

use Aivo\Highchart\DataPoint\DataPointInterface;
use PHPUnit_Framework_TestCase as TestCase;

abstract class AbstractDataPointTest extends TestCase
{
    /**
     * @return DataPointInterface
     */
    protected function getDataPoint()
    {
        return $this->getMockForAbstractClass('Aivo\Highchart\DataPoint\DataPointInterface');
    }

    public function testName()
    {
        $dataPoint = $this->getDataPoint();

        $this->assertNull($dataPoint->getName());
        $this->assertSame($dataPoint, $dataPoint->setName('Test'));
        $this->assertSame('Test', $dataPoint->getName());
    }

    public function testXValue()
    {
        $dataPoint = $this->getDataPoint();

        $this->assertNull($dataPoint->getXValue());
        $this->assertSame($dataPoint, $dataPoint->setXValue(10));
        $this->assertSame(10, $dataPoint->getXValue());
        $this->assertSame($dataPoint, $dataPoint->setXValue(10.1));
        $this->assertSame(10.1, $dataPoint->getXValue());
        $this->assertSame($dataPoint, $dataPoint->setXValue(null));
        $this->assertNull($dataPoint->getXValue());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testXValueInvalidArgumentException()
    {
        $dataPoint = $this->getDataPoint();

        $dataPoint->setXValue('test');
    }

    public function testYValue()
    {
        $dataPoint = $this->getDataPoint();

        $this->assertNull($dataPoint->getYValue());
        $this->assertSame($dataPoint, $dataPoint->setYValue(10));
        $this->assertSame(10, $dataPoint->getYValue());
        $this->assertSame($dataPoint, $dataPoint->setYValue(10.1));
        $this->assertSame(10.1, $dataPoint->getYValue());
        $this->assertSame($dataPoint, $dataPoint->setYValue(null));
        $this->assertNull($dataPoint->getYValue());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testYValueInvalidArgumentException()
    {
        $dataPoint = $this->getDataPoint();

        $dataPoint->setYValue('test');
    }
}
