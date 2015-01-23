<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aivo\Highchart\Test\Axis\Title;

use Aivo\Highchart\Axis\AxisInterface;
use Aivo\Highchart\Axis\Title\Title;
use PHPUnit_Framework_TestCase as TestCase;

class TitleTest extends TestCase
{
    /**
     * @var AxisInterface
     */
    protected $mockAxis;

    public function setUp()
    {
        $this->mockAxis = $this->getMock('Aivo\Highchart\Axis\AxisInterface');
    }

    /**
     * @return Title
     */
    protected function createTitle()
    {
        return new Title($this->mockAxis);
    }

    public function testAxis()
    {
        $title = $this->createTitle();

        $this->assertSame($this->mockAxis, $title->getAxis());
    }

    public function testEnabled()
    {
        $title = $this->createTitle();

        $this->assertTrue($title->isEnabled());
        $this->assertSame($title, $title->setEnabled(false));
        $this->assertFalse($title->isEnabled());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testEnabledInvalidArgumentException()
    {
        $title = $this->createTitle();

        $title->setEnabled(null);
    }

    public function testText()
    {
        $title = $this->createTitle();

        $this->assertNull($title->getText());
        $this->assertSame($title, $title->setText('Text'));
        $this->assertEquals('Text', $title->getText());
    }

    public function testStyle()
    {
        $title = $this->createTitle();

        $this->assertSame(array(), $title->getStyles());
        $this->assertSame($title, $title->setStyle('one', 'One'));
        $this->assertSame(array('one' => 'One'), $title->getStyles());
        $this->assertSame($title, $title->setStyles(array('two' => 'Two', 'three' => 'Three')));
        $this->assertSame(array('two' => 'Two', 'three' => 'Three'), $title->getStyles());
        $this->assertSame('Three', $title->getStyle('three'));
        $this->assertNull($title->getStyle('four'));
    }
}
