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

use Aivo\Highchart\Series\PieSeries;

class PieSeriesTest extends AbstractSeriesTest
{
    public function getSeries()
    {
        return new PieSeries();
    }

    public function testFactory()
    {
        $this->assertInstanceOf('Aivo\Highchart\Series\PieSeriesInterface', PieSeries::factory());
    }

    public function testXPosition()
    {
        $series = $this->getSeries();

        $this->assertNull($series->getXPosition());
        $this->assertFalse($series->isXPositionAPercentage());
        $this->assertSame($series, $series->setXPosition(10, true));
        $this->assertSame(10, $series->getXPosition());
        $this->assertTrue($series->isXPositionAPercentage());
        $this->assertSame($series, $series->setXPosition(null, false));
        $this->assertNull($series->getXPosition());
        $this->assertFalse($series->isXPositionAPercentage());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testXPositionInvalidArgumentExceptionOnPosition()
    {
        $series = $this->getSeries();

        $series->setXPosition('test', false);
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testXPositionInvalidArgumentExceptionOnPercentage()
    {
        $series = $this->getSeries();

        $series->setXPosition(10, 'test');
    }

    public function testYPosition()
    {
        $series = $this->getSeries();

        $this->assertNull($series->getYPosition());
        $this->assertFalse($series->isYPositionAPercentage());
        $this->assertSame($series, $series->setYPosition(10, true));
        $this->assertSame(10, $series->getYPosition());
        $this->assertTrue($series->isYPositionAPercentage());
        $this->assertSame($series, $series->setYPosition(null, false));
        $this->assertNull($series->getYPosition());
        $this->assertFalse($series->isYPositionAPercentage());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testYPositionInvalidArgumentExceptionOnPosition()
    {
        $series = $this->getSeries();

        $series->setYPosition('test', false);
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testYPositionInvalidArgumentExceptionOnPercentage()
    {
        $series = $this->getSeries();

        $series->setYPosition(10, 'test');
    }

    public function testSize()
    {
        $series = $this->getSeries();

        $this->assertNull($series->getSize());
        $this->assertFalse($series->isSizeAPercentage());
        $this->assertSame($series, $series->setSize(10, true));
        $this->assertSame(10, $series->getSize());
        $this->assertTrue($series->isSizeAPercentage());
        $this->assertSame($series, $series->setSize(null, false));
        $this->assertNull($series->getSize());
        $this->assertFalse($series->isSizeAPercentage());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testSizeInvalidArgumentExceptionOnPosition()
    {
        $series = $this->getSeries();

        $series->setSize('test', false);
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testSizeInvalidArgumentExceptionOnPercentage()
    {
        $series = $this->getSeries();

        $series->setSize(10, 'test');
    }

    public function testLabelsDistance()
    {
        $series = $this->getSeries();

        $this->assertNull($series->getLabelsDistance());
        $this->assertSame($series, $series->setLabelsDistance(10));
        $this->assertSame(10, $series->getLabelsDistance());
        $this->assertSame($series, $series->setLabelsDistance(null));
        $this->assertNull($series->getLabelsDistance());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testLabelsDistanceInvalidArgumentException()
    {
        $series = $this->getSeries();

        $series->setLabelsDistance('test');
    }

    public function testHoverState()
    {
        $series = $this->getSeries();

        $this->assertInstanceOf('Aivo\Highchart\Series\State\SolidHoverStateInterface', $series->getHoverState());
    }
}
