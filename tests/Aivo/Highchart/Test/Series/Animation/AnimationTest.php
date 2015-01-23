<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aivo\Highchart\Test\Series\Animation;

use Aivo\Highchart\Series\Animation\Animation;
use Aivo\Highchart\Series\SeriesInterface;
use PHPUnit_Framework_TestCase as TestCase;

class AnimationTest extends TestCase
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
     * @return Animation
     */
    protected function createAnimation()
    {
        return new Animation($this->mockSeries);
    }

    public function testSeries()
    {
        $animation = $this->createAnimation();

        $this->assertSame($this->mockSeries, $animation->getSeries());
    }

    public function testEnabled()
    {
        $animation = $this->createAnimation();

        $this->assertTrue(is_bool($animation->isEnabled()));
        $this->assertSame($animation, $animation->setEnabled(false));
        $this->assertFalse($animation->isEnabled());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testEnabledInvalidArgumentException()
    {
        $animation = $this->createAnimation();

        $animation->setEnabled('test');
    }

    public function testDuration()
    {
        $animation = $this->createAnimation();

        $this->assertSame($animation, $animation->setDuration(1000));
        $this->assertSame(1000, $animation->getDuration());
        $this->assertSame($animation, $animation->setDuration(null));
        $this->assertNull($animation->getDuration());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testDurationInvalidArgumentException()
    {
        $animation = $this->createAnimation();

        $animation->setDuration('test');
    }

    public function testEasing()
    {
        $animation = $this->createAnimation();

        $this->assertSame($animation, $animation->setEasing('swing'));
        $this->assertSame('swing', $animation->getEasing());
        $this->assertSame($animation, $animation->setEasing(null));
        $this->assertNull($animation->getEasing());
    }

    /**
     * @expectedException \Aivo\Highchart\Exception\InvalidArgumentException
     */
    public function testEasingInvalidArgumentException()
    {
        $animation = $this->createAnimation();

        $animation->setEasing(false);
    }
}
