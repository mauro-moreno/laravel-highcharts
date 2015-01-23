<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aivo\Highchart\Test\Series\State;

use Aivo\Highchart\Series\SeriesInterface;
use Aivo\Highchart\Series\State\AbstractState;
use PHPUnit_Framework_TestCase as TestCase;

class AbstractStateTest extends TestCase
{
    /**
     * @var SeriesInterface
     */
    protected $mockSeries;

    public function setUp()
    {
        $this->mockSeries = $this->getMock('Aivo\Highchart\Series\SeriesInterface');
    }

    /**
     * @return AbstractState
     */
    protected function createState()
    {
        return $this->getMockForAbstractClass('Aivo\Highchart\Series\State\AbstractState', array($this->mockSeries));
    }

    public function testSeries()
    {
        $state = $this->createState();

        $this->assertSame($this->mockSeries, $state->getSeries());
    }

    public function testEnabled()
    {
        $state = $this->createState();

        $this->assertTrue(is_bool($state->isEnabled()));
        $this->assertSame($state, $state->setEnabled(false));
        $this->assertFalse($state->isEnabled());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testEnabledInvalidArgumentException()
    {
        $state = $this->createState();

        $state->setEnabled(null);
    }

    public function testLineWidth()
    {
        $state = $this->createState();

        $this->assertSame($state, $state->setLineWidth(2));
        $this->assertSame(2, $state->getLineWidth());
        $this->assertSame($state, $state->setLineWidth(null));
        $this->assertNull($state->getLineWidth());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testLineWidthInvalidArgumentException()
    {
        $state = $this->createState();

        $state->setLineWidth(true);
    }

    public function testMarker()
    {
        $state = $this->createState();

        $this->assertInstanceOf('Aivo\Highchart\Series\Marker\MarkerInterface', $state->getMarker());
    }
}
