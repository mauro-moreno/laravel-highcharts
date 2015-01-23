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

use Aivo\Highchart\Series\AbstractSequentialSeries;

class AbstractSequentialSeriesTest extends AbstractSeriesTest
{

    /**
     * @return AbstractSequentialSeries
     */
    protected function getSeries()
    {
        return $this->getMockForAbstractClass('Aivo\Highchart\Series\AbstractSequentialSeries');
    }

    public function testPointStart()
    {
        $series = $this->getSeries();

        $this->assertNull($series->getPointStart());
        $this->assertSame($series, $series->setPointStart(10));
        $this->assertSame(10, $series->getPointStart());
        $this->assertSame($series, $series->setPointStart(null));
        $this->assertNull($series->getPointStart());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testPointStartInvalidArgumentException()
    {
        $series = $this->getSeries();

        $series->setPointStart('test');
    }

    public function testColor()
    {
        $series = $this->getSeries();

        $this->assertNull($series->getPointStart());
        $this->assertSame($series, $series->setPointStart(10));
        $this->assertSame(10, $series->getPointStart());
        $this->assertSame($series, $series->setPointStart(null));
        $this->assertNull($series->getPointStart());
    }

}
