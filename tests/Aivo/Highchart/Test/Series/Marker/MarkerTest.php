<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aivo\Highchart\Test\Series\Marker;

use Aivo\Highchart\Series\Marker\Marker;
use Aivo\Highchart\Series\Marker\MarkerInterface;
use Aivo\Highchart\Series\SeriesInterface;
use PHPUnit_Framework_TestCase as TestCase;

class MarkerTest extends TestCase
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
     * @return Marker
     */
    protected function createMarker()
    {
        return new Marker($this->mockSeries);
    }

    public function testSeries()
    {
        $marker = $this->createMarker();

        $this->assertSame($this->mockSeries, $marker->getSeries());
    }

    public function testEnabled()
    {
        $marker = $this->createMarker();

        $this->assertTrue($marker->isEnabled());
        $this->assertSame($marker, $marker->setEnabled(false));
        $this->assertFalse($marker->isEnabled());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testEnabledInvalidArgumentException()
    {
        $marker = $this->createMarker();

        $marker->setEnabled('test');
    }

    public function testFillColor()
    {
        $marker = $this->createMarker();

        $this->assertSame($marker, $marker->setFillColor('#ffffff'));
        $this->assertSame('#ffffff', $marker->getFillColor());
        $this->assertSame($marker, $marker->setFillColor(null));
        $this->assertNull($marker->getFillColor());
    }

    public function testLineColor()
    {
        $marker = $this->createMarker();

        $this->assertSame($marker, $marker->setLineColor('#ffffff'));
        $this->assertSame('#ffffff', $marker->getLineColor());
        $this->assertSame($marker, $marker->setLineColor(null));
        $this->assertNull($marker->getLineColor());
    }

    public function testLineWidth()
    {
        $marker = $this->createMarker();

        $this->assertTrue(is_int($marker->getLineWidth()));
        $this->assertSame($marker, $marker->setLineWidth(10));
        $this->assertSame(10, $marker->getLineWidth());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testLineWidthInvalidArgumentException()
    {
        $marker = $this->createMarker();

        $marker->setLineWidth('test');
    }

    public function testRadius()
    {
        $marker = $this->createMarker();

        $this->assertTrue(is_int($marker->getRadius()));
        $this->assertSame($marker, $marker->setRadius(10));
        $this->assertSame(10, $marker->getRadius());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testRadiusInvalidArgumentException()
    {
        $marker = $this->createMarker();

        $marker->setRadius('test');
    }

    public function testSymbol()
    {
        $marker = $this->createMarker();

        $this->assertSame($marker, $marker->setSymbol(MarkerInterface::SYMBOL_TRIANGLE));
        $this->assertSame(MarkerInterface::SYMBOL_TRIANGLE, $marker->getSymbol());
        $this->assertSame($marker, $marker->setSymbol(null));
        $this->assertSame(null, $marker->getSymbol());
    }
}
