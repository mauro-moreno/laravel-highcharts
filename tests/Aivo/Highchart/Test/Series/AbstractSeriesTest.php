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

use Aivo\Highchart\Series\AbstractSeries;
use PHPUnit_Framework_TestCase as TestCase;

class AbstractSeriesTest extends TestCase
{

    /**
     * @return AbstractSeries
     */
    protected function getSeries()
    {
        return $this->getMockForAbstractClass('Aivo\Highchart\Series\AbstractSeries');
    }

    public function testName()
    {
        $series = $this->getSeries();

        $this->assertNull($series->getName());
        $this->assertSame($series, $series->setName('Test'));
        $this->assertSame('Test', $series->getName());
        $this->assertSame($series, $series->setName(null));
        $this->assertNull($series->getName());
    }

    public function testColor()
    {
        $series = $this->getSeries();

        $this->assertNull($series->getColor());
        $this->assertSame($series, $series->setColor('Test'));
        $this->assertSame('Test', $series->getColor());
        $this->assertSame($series, $series->setColor(null));
        $this->assertNull($series->getColor());
    }

    public function testDataPoint()
    {
        $series = $this->getSeries();

        $dataPoint1 = $this->getMock('Aivo\Highchart\DataPoint\DataPointInterface');
        $dataPoint2 = $this->getMock('Aivo\Highchart\DataPoint\DataPointInterface');

        $this->assertEmpty($series->getDataPoints());
        $this->assertSame($series, $series->addDataPoint($dataPoint1));
        $this->assertSame($series, $series->addDataPoint($dataPoint2));
        $this->assertSame(array($dataPoint1, $dataPoint2), $series->getDataPoints());
        $this->assertSame($series, $series->addData(array(1, 2)));

        $dataPoints = $series->getDataPoints();

        $this->assertSame(1, $dataPoints[2]->getYValue());
        $this->assertSame(2, $dataPoints[3]->getYValue());
    }

    public function testDataCategories()
    {
        $series = $this->getSeries();

        $xAxis = $this->getMock('Aivo\Highchart\Axis\XAxisInterface');
        $xAxis->expects($this->any())
                ->method('getCategories')
                ->will($this->returnValue(array('one' => 'One', 'two' => 'Two')));

        $series->setXAxis($xAxis);

        $this->assertSame($series, $series->addData(array('two' => 2, 'one' => 1, 'three' => 3)));

        $dataPoints = $series->getDataPoints();

        $this->assertSame(1, $dataPoints[0]->getXValue());
        $this->assertSame(2, $dataPoints[0]->getYValue());
        $this->assertSame(0, $dataPoints[1]->getXValue());
        $this->assertSame(1, $dataPoints[1]->getYValue());
        $this->assertNull($dataPoints[2]->getXValue());
        $this->assertSame(3, $dataPoints[2]->getYValue());
    }

    public function testXAxis()
    {
        $series = $this->getSeries();

        $axis = $this->getMock('Aivo\Highchart\Axis\XAxisInterface');

        $this->assertNull($series->getXAxis());
        $this->assertSame($series, $series->setXAxis($axis));
        $this->assertSame($axis, $series->getXAxis());
        $this->assertSame($series, $series->setXAxis(null));
        $this->assertNull($series->getXAxis());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testXAxisInvalidArgumentException()
    {
        $series = $this->getSeries();

        $series->setXAxis('test');
    }

    public function testYAxis()
    {
        $series = $this->getSeries();

        $axis = $this->getMock('Aivo\Highchart\Axis\YAxisInterface');

        $this->assertNull($series->getYAxis());
        $this->assertSame($series, $series->setYAxis($axis));
        $this->assertSame($axis, $series->getYAxis());
        $this->assertSame($series, $series->setYAxis(null));
        $this->assertNull($series->getYAxis());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testYAxisInvalidArgumentException()
    {
        $series = $this->getSeries();

        $series->setYAxis('test');
    }

    public function testEnableMouseTracking()
    {
        $series = $this->getSeries();

        $this->assertTrue($series->isEnableMouseTracking());
        $this->assertSame($series, $series->setEnableMouseTracking(false));
        $this->assertFalse($series->isEnableMouseTracking());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testEnableMouseTrackingInvalidArgumentException()
    {
        $series = $this->getSeries();

        $series->setEnableMouseTracking('test');
    }

    public function testMarker()
    {
        $series = $this->getSeries();

        $this->assertInstanceOf('Aivo\Highchart\Series\Marker\MarkerInterface', $series->getMarker());
    }

    public function testCursor()
    {
        $series = $this->getSeries();

        $this->assertSame($series, $series->setCursor('pointer'));
        $this->assertSame('pointer', $series->getCursor());
        $this->assertSame($series, $series->setCursor(null));
        $this->assertNull($series->getCursor());
    }

    public function testWeight()
    {
        $series = $this->getSeries();

        $this->assertTrue(is_int($series->getWeight()));
        $this->assertSame($series, $series->setWeight(10));
        $this->assertSame(10, $series->getWeight());
        $this->assertSame($series, $series->setWeight(1.1));
        $this->assertSame(1.1, $series->getWeight());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testWeightInvalidArgumentException()
    {
        $series = $this->getSeries();

        $series->setWeight('test');
    }

    public function testCheckboxClickEvent()
    {
        $series = $this->getSeries();

        $event = $this->getMock('Zend\Json\Expr', array(), array('test'));

        $this->assertSame($series, $series->setCheckboxClickEvent($event));
        $this->assertSame($event, $series->getCheckboxClickEvent());
        $this->assertSame($series, $series->setCheckboxClickEvent(null));
        $this->assertNull($series->getCheckboxClickEvent());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testCheckboxClickEventInvalidArgumentException()
    {
        $series = $this->getSeries();

        $series->setCheckboxClickEvent('test');
    }

    public function testClickEvent()
    {
        $series = $this->getSeries();

        $event = $this->getMock('Zend\Json\Expr', array(), array('test'));

        $this->assertSame($series, $series->setClickEvent($event));
        $this->assertSame($event, $series->getClickEvent());
        $this->assertSame($series, $series->setClickEvent(null));
        $this->assertNull($series->getClickEvent());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testClickEventInvalidArgumentException()
    {
        $series = $this->getSeries();

        $series->setClickEvent('test');
    }

    public function testHideEvent()
    {
        $series = $this->getSeries();

        $event = $this->getMock('Zend\Json\Expr', array(), array('test'));

        $this->assertSame($series, $series->setHideEvent($event));
        $this->assertSame($event, $series->getHideEvent());
        $this->assertSame($series, $series->setHideEvent(null));
        $this->assertNull($series->getHideEvent());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testHideEventInvalidArgumentException()
    {
        $series = $this->getSeries();

        $series->setHideEvent('test');
    }

    public function testLegendItemClickEvent()
    {
        $series = $this->getSeries();

        $event = $this->getMock('Zend\Json\Expr', array(), array('test'));

        $this->assertSame($series, $series->setLegendItemClickEvent($event));
        $this->assertSame($event, $series->getLegendItemClickEvent());
        $this->assertSame($series, $series->setLegendItemClickEvent(null));
        $this->assertNull($series->getLegendItemClickEvent());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testLegendItemClickEventInvalidArgumentException()
    {
        $series = $this->getSeries();

        $series->setLegendItemClickEvent('test');
    }

    public function testMouseOutEvent()
    {
        $series = $this->getSeries();

        $event = $this->getMock('Zend\Json\Expr', array(), array('test'));

        $this->assertSame($series, $series->setMouseOutEvent($event));
        $this->assertSame($event, $series->getMouseOutEvent());
        $this->assertSame($series, $series->setMouseOutEvent(null));
        $this->assertNull($series->getMouseOutEvent());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testMouseOutEventInvalidArgumentException()
    {
        $series = $this->getSeries();

        $series->setMouseOutEvent('test');
    }

    public function testMouseOverEvent()
    {
        $series = $this->getSeries();

        $event = $this->getMock('Zend\Json\Expr', array(), array('test'));

        $this->assertSame($series, $series->setMouseOverEvent($event));
        $this->assertSame($event, $series->getMouseOverEvent());
        $this->assertSame($series, $series->setMouseOverEvent(null));
        $this->assertNull($series->getMouseOverEvent());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testMouseOverEventInvalidArgumentException()
    {
        $series = $this->getSeries();

        $series->setMouseOverEvent('test');
    }

    public function testShowEvent()
    {
        $series = $this->getSeries();

        $event = $this->getMock('Zend\Json\Expr', array(), array('test'));

        $this->assertSame($series, $series->setShowEvent($event));
        $this->assertSame($event, $series->getShowEvent());
        $this->assertSame($series, $series->setShowEvent(null));
        $this->assertNull($series->getShowEvent());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testShowEventInvalidArgumentException()
    {
        $series = $this->getSeries();

        $series->setShowEvent('test');
    }

    public function testAnimation()
    {
        $series = $this->getSeries();

        $this->assertInstanceOf('Aivo\Highchart\Series\Animation\AnimationInterface', $series->getAnimation());
    }

    public function testHoverState()
    {
        $series = $this->getSeries();

        $this->assertInstanceOf('Aivo\Highchart\Series\State\HoverStateInterface', $series->getHoverState());
    }

}
