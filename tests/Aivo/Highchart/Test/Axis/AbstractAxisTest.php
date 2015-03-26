<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aivo\Highchart\Test\Axis;

use Aivo\Highchart\Axis\AbstractAxis;
use PHPUnit_Framework_TestCase as TestCase;

class AbstractAxisTest extends TestCase
{
    /**
     * @return AbstractAxis
     */
    protected function getAxis()
    {
        return $this->getMockForAbstractClass('Aivo\Highchart\Axis\AbstractAxis');
    }

    public function testTooltip()
    {
        $axis = $this->getAxis();

        $this->assertInstanceOf('Aivo\Highchart\Axis\Title\TitleInterface', $axis->getTitle());
    }

    public function testLabel()
    {
        $axis = $this->getAxis();

        $this->assertInstanceOf('Aivo\Highchart\Axis\Label\LabelInterface', $axis->getLabel());
    }

    public function testCategories()
    {
        $axis = $this->getAxis();

        $this->assertSame(array(), $axis->getCategories());
        $this->assertSame($axis, $axis->addCategory('one', 'One'));
        $this->assertSame($axis, $axis->addCategories(array('two' => 'Two', 'three' => 'Three')));
        $this->assertSame(array('one' => 'One', 'two' => 'Two', 'three' => 'Three'), $axis->getCategories());
        $this->assertSame('Three', $axis->getCategory('three'));
        $this->assertNull($axis->getCategory('four'));
        $this->assertSame($axis, $axis->clearCategories());
        $this->assertEmpty($axis->getCategories());
    }

    public function testMaxValue()
    {
        $axis = $this->getAxis();

        $this->assertSame($axis, $axis->setMaxValue(100));
        $this->assertSame(100, $axis->getMaxValue());
        $this->assertSame($axis, $axis->setMaxValue(10.5));
        $this->assertSame(10.5, $axis->getMaxValue());
        $this->assertSame($axis, $axis->setMaxValue(null));
        $this->assertNull($axis->getMaxValue());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testMaxValueArgumentException()
    {
        $axis = $this->getAxis();

        $axis->setMaxValue('test');
    }

    public function testMinValue()
    {
        $axis = $this->getAxis();

        $this->assertSame($axis, $axis->setMinValue(100));
        $this->assertSame(100, $axis->getMinValue());
        $this->assertSame($axis, $axis->setMinValue(10.5));
        $this->assertSame(10.5, $axis->getMinValue());
        $this->assertSame($axis, $axis->setMinValue(null));
        $this->assertNull($axis->getMinValue());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testMinValueArgumentException()
    {
        $axis = $this->getAxis();

        $axis->setMinValue('test');
    }

    public function testOpposite()
    {
        $axis = $this->getAxis();

        $this->assertFalse($axis->isOpposite());
        $this->assertSame($axis, $axis->setOpposite());
        $this->assertTrue($axis->isOpposite());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testOppositeInvalidArgumentException()
    {
        $axis = $this->getAxis();

        $axis->setOpposite(null);
    }

    public function testTickWidth()
    {
        $axis = $this->getAxis();

        $this->assertTrue(is_int($axis->getTickWidth()));
        $this->assertSame($axis, $axis->setTickWidth(10));
        $this->assertSame(10, $axis->getTickWidth());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testTickWidthInvalidArgumentException()
    {
        $axis = $this->getAxis();

        $axis->setTickWidth(null);
    }

    public function testGridLineWidth()
    {
        $axis = $this->getAxis();

        $this->assertTrue(is_int($axis->getGridLineWidth()));
        $this->assertSame($axis, $axis->setGridLineWidth(10));
        $this->assertSame(10, $axis->getGridLineWidth());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testGridLineWidthInvalidArgumentException()
    {
        $axis = $this->getAxis();

        $axis->setGridLineWidth(null);
    }

    public function testReversed()
    {
        $axis = $this->getAxis();

        $this->assertFalse($axis->isReversed());
        $this->assertSame($axis, $axis->setReversed());
        $this->assertTrue($axis->isReversed());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testReversedInvalidArgumentException()
    {
        $axis = $this->getAxis();

        $axis->setReversed(null);
    }
}
