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

use Aivo\Highchart\AbstractChart;
use PHPUnit_Framework_TestCase as TestCase;

class AbstractChartTest extends TestCase
{

    /**
     * @return AbstractChart
     */
    protected function createChart()
    {
        return $this->getMockForAbstractClass('Aivo\Highchart\AbstractChart');
    }

    public function testTitle()
    {
        $chart = $this->createChart();

        $this->assertNull($chart->getTitle());
        $this->assertSame($chart, $chart->setTitle('Title'));
        $this->assertSame('Title', $chart->getTitle());
    }

    public function testSubtitle()
    {
        $chart = $this->createChart();

        $this->assertNull($chart->getSubtitle());
        $this->assertSame($chart, $chart->setSubtitle('Subtitle'));
        $this->assertSame('Subtitle', $chart->getSubtitle());
    }

    public function testXAxis()
    {
        $chart = $this->createChart();

        $this->assertEmpty($chart->getXAxes());

        $axis1 = $this->getMock('Aivo\Highchart\Axis\XAxisInterface');
        $axis2 = $this->getMock('Aivo\Highchart\Axis\XAxisInterface');

        $this->assertSame($chart, $chart->addXAxis($axis1));
        $this->assertSame($chart, $chart->addXAxis($axis2));
        $this->assertSame(array($axis1, $axis2), $chart->getXAxes());
        $this->assertSame($axis1, $chart->getXAxis(0));
        $this->assertSame($axis2, $chart->getXAxis(1));
        $this->assertNull($chart->getXAxis(2));
    }

    public function testYAxis()
    {
        $chart = $this->createChart();

        $this->assertEmpty($chart->getYAxes());

        $axis1 = $this->getMock('Aivo\Highchart\Axis\YAxisInterface');
        $axis2 = $this->getMock('Aivo\Highchart\Axis\YAxisInterface');

        $this->assertSame($chart, $chart->addYAxis($axis1));
        $this->assertSame($chart, $chart->addYAxis($axis2));
        $this->assertSame(array($axis1, $axis2), $chart->getYAxes());
        $this->assertSame($axis1, $chart->getYAxis(0));
        $this->assertSame($axis2, $chart->getYAxis(1));
        $this->assertNull($chart->getYAxis(2));
    }

    public function testSeries()
    {
        $chart = $this->createChart();

        $this->assertEmpty($chart->getSeries());

        $series1 = $this->getMock('Aivo\Highchart\Series\SeriesInterface');
        $series2 = $this->getMock('Aivo\Highchart\Series\SeriesInterface');

        $this->assertSame($chart, $chart->addSeries($series1));
        $this->assertSame($chart, $chart->addSeries($series2));
        $this->assertSame(array($series1, $series2), $chart->getSeries());
        $this->assertSame($chart, $chart->clearSeries());
        $this->assertEmpty($chart->getSeries());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testSeriesInvalidArgumentExceptionOnIndividual()
    {
        $chart = $this->createChart();

        $chart->addSeries('test');
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testSeriesInvalidArgumentExceptionOnArray()
    {
        $chart = $this->createChart();

        $chart->addSeries(array($this->getMock('Aivo\Highchart\Series\SeriesInterface'), 'test'));
    }

    public function testLegend()
    {
        $chart = $this->createChart();

        $this->assertTrue($chart->hasLegend());
        $this->assertSame($chart, $chart->setLegend(false));
        $this->assertFalse($chart->hasLegend());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testLegendInvalidArgumentException()
    {
        $chart = $this->createChart();

        $chart->setLegend(null);
    }

    public function testTooltip()
    {
        $chart = $this->createChart();

        $this->assertInstanceOf('Aivo\Highchart\Tooltip\TooltipInterface', $chart->getTooltip());
    }

    public function testCredits()
    {
        $chart = $this->createChart();

        $this->assertInstanceOf('Aivo\Highchart\Credit\CreditInterface', $chart->getCredit());
    }

}
