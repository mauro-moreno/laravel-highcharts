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

use Aivo\Highchart\Series\AbstractStackableSeries;

class AbstractStackableSeriesTest extends AbstractSequentialSeriesTest
{
    /**
     * @return AbstractStackableSeries
     */
    protected function getSeries()
    {
        return $this->getMockForAbstractClass('Aivo\Highchart\Series\AbstractStackableSeries');
    }

    public function testStacking()
    {
        $series = $this->getSeries();

        $this->assertFalse($series->isStacking());
        $this->assertFalse($series->isPercentageStacking());
        $this->assertSame($series, $series->setStacking(true, false));
        $this->assertTrue($series->isStacking());
        $this->assertFalse($series->isPercentageStacking());
        $this->assertSame($series, $series->setStacking(false, true));
        $this->assertFalse($series->isStacking());
        $this->assertFalse($series->isPercentageStacking());
        $this->assertSame($series, $series->setStacking(true, true));
        $this->assertTrue($series->isStacking());
        $this->assertTrue($series->isPercentageStacking());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testStackingInvalidArgumentExceptionOnStacking()
    {
        $series = $this->getSeries();

        $series->setStacking(null, false);
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testStackingInvalidArgumentExceptionOnPercentageStacking()
    {
        $series = $this->getSeries();

        $series->setStacking(true, null);
    }

    public function testGroup()
    {
        $series = $this->getSeries();

        $this->assertNull($series->getGroup());
        $this->assertSame($series, $series->setGroup('test'));
        $this->assertSame('test', $series->getGroup());
    }
}
