<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aivo\Highchart\Test\Credit;

use Aivo\Highchart\ChartInterface;
use Aivo\Highchart\Credit\Credit;
use PHPUnit_Framework_TestCase as TestCase;

class CreditTest extends TestCase
{
    /**
     * @var ChartInterface
     */
    protected $mockChart;

    public function setUp()
    {
        $this->mockChart = $this->getMock('Aivo\Highchart\ChartInterface');
    }

    /**
     * @return Credit
     */
    protected function createCredit()
    {
        return new Credit($this->mockChart);
    }

    public function testChart()
    {
        $credit = $this->createCredit();

        $this->assertSame($this->mockChart, $credit->getChart());
    }

    public function testEnabled()
    {
        $credit = $this->createCredit();

        $this->assertTrue(is_bool($credit->isEnabled()));
        $this->assertSame($credit, $credit->setEnabled(false));
        $this->assertFalse($credit->isEnabled());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testEnabledInvalidArgumentException()
    {
        $credit = $this->createCredit();

        $credit->setEnabled(null);
    }

    public function testText()
    {
        $credit = $this->createCredit();

        $this->assertSame($credit, $credit->setText('Test'));
        $this->assertSame('Test', $credit->getText());
        $this->assertSame($credit, $credit->setText(null));
        $this->assertNull($credit->getText());
    }

    public function testUrl()
    {
        $credit = $this->createCredit();

        $this->assertSame($credit, $credit->setUrl('Test'));
        $this->assertSame('Test', $credit->getUrl());
        $this->assertSame($credit, $credit->setUrl(null));
        $this->assertNull($credit->getUrl());
    }

    public function testHorizontalAlignment()
    {
        $credit = $this->createCredit();

        $this->assertSame($credit, $credit->setHorizontalAlignment('Test'));
        $this->assertSame('Test', $credit->getHorizontalAlignment());
        $this->assertSame($credit, $credit->setHorizontalAlignment(null));
        $this->assertNull($credit->getHorizontalAlignment());
    }

    public function testVerticalAlignment()
    {
        $credit = $this->createCredit();

        $this->assertSame($credit, $credit->setVerticalAlignment('Test'));
        $this->assertSame('Test', $credit->getVerticalAlignment());
        $this->assertSame($credit, $credit->setVerticalAlignment(null));
        $this->assertNull($credit->getVerticalAlignment());
    }

    public function testXPosition()
    {
        $credit = $this->createCredit();

        $this->assertSame($credit, $credit->setXPosition(10));
        $this->assertSame(10, $credit->getXPosition());
        $this->assertSame($credit, $credit->setXPosition(null));
        $this->assertNull($credit->getXPosition());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testXPositionException()
    {
        $credit = $this->createCredit();

        $credit->setXPosition('test');
    }

    public function testYPosition()
    {
        $credit = $this->createCredit();

        $this->assertSame($credit, $credit->setYPosition(10));
        $this->assertSame(10, $credit->getYPosition());
        $this->assertSame($credit, $credit->setYPosition(null));
        $this->assertNull($credit->getYPosition());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testYPositionException()
    {
        $credit = $this->createCredit();

        $credit->setYPosition('test');
    }

    public function testStyle()
    {
        $credit = $this->createCredit();

        $this->assertSame(array(), $credit->getStyles());
        $this->assertSame($credit, $credit->setStyle('one', 'One'));
        $this->assertSame(array('one' => 'One'), $credit->getStyles());
        $this->assertSame($credit, $credit->setStyles(array('two' => 'Two', 'three' => 'Three')));
        $this->assertSame(array('two' => 'Two', 'three' => 'Three'), $credit->getStyles());
        $this->assertSame('Three', $credit->getStyle('three'));
        $this->assertNull($credit->getStyle('four'));
    }
}
