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

use Aivo\Highchart\Series\State\AbstractSolidHoverState;

class AbstractSolidHoverStateTest extends AbstractHoverStateTest
{
    /**
     * @return AbstractSolidHoverState
     */
    protected function createState()
    {
        return $this->getMockForAbstractClass(
            'Aivo\Highchart\Series\State\AbstractSolidHoverState',
            array($this->mockSeries)
        );
    }

    public function testBrightness()
    {
        $state = $this->createState();

        $this->assertSame($state, $state->setBrightness(0.5));
        $this->assertSame(0.5, $state->getBrightness());
        $this->assertSame($state, $state->setBrightness(null));
        $this->assertNull($state->getBrightness());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testBrightnessInvalidArgumentException()
    {
        $state = $this->createState();

        $state->setBrightness('test');
    }
}
