<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aivo\Highchart\DataPoint;

use Aivo\Highchart\Exception\InvalidArgumentException;

/**
 * Abstract series data point.
 *
 * @author Chris Wilkinson <chris.wilkinson@admin.cam.ac.uk>
 */
abstract class AbstractDataPoint implements DataPointInterface
{

    /**
     * Name.
     *
     * @var string|null
     */
    protected $name;

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * X-value.
     *
     * @var int|null
     */
    protected $xValue;

    /**
     * {@inheritdoc}
     */
    public function getXValue()
    {
        return $this->xValue;
    }

    /**
     * {@inheritdoc}
     */
    public function setXValue($xValue)
    {
        if (false === is_int($xValue) && false === is_float($xValue) && false === is_null($xValue)) {
            throw new InvalidArgumentException();
        }

        $this->xValue = $xValue;

        return $this;
    }

    /**
     * Y-value.
     *
     * @var int|null
     */
    protected $yValue;

    /**
     * {@inheritdoc}
     */
    public function getYValue()
    {
        return $this->yValue;
    }

    /**
     * {@inheritdoc}
     */
    public function setYValue($yValue)
    {
        if (false === is_int($yValue) && false === is_float($yValue) && false === is_null($yValue)) {
            throw new InvalidArgumentException();
        }

        $this->yValue = $yValue;

        return $this;
    }

    /**
     * Color.
     *
     * @var string|null
     */
    protected $color;

    /**
     * {@inheritdoc}
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * {@inheritdoc}
     */
    public function setColor($color = null)
    {
        $this->color = $color;

        return $this;
    }

}
