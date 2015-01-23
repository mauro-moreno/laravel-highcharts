<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aivo\Highchart\Series\Marker;

use Aivo\Highchart\Series\SeriesInterface;
use Aivo\Highchart\Exception\InvalidArgumentException;

class Marker implements MarkerInterface
{

    /**
     * Constructor.
     *
     * @param SeriesInterface $series Series.
     */
    public function __construct(SeriesInterface $series)
    {
        $this->series = $series;
    }

    /**
     * Series.
     *
     * @var SeriesInterface
     */
    protected $series;

    /**
     * {@inheritdoc}
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * Is enabled.
     *
     * @var bool
     */
    protected $enabled = true;

    /**
     * {@inheritdoc}
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * {@inheritdoc}
     */
    public function setEnabled($enabled = true)
    {
        if (false === is_bool($enabled)) {
            throw new InvalidArgumentException;
        }

        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Fill color.
     *
     * @var string|null
     */
    protected $fillColor;

    /**
     * {@inheritdoc}
     */
    public function getFillColor()
    {
        return $this->fillColor;
    }

    /**
     * {@inheritdoc}
     */
    public function setFillColor($fillColor)
    {
        $this->fillColor = $fillColor;

        return $this;
    }

    /**
     * Line color.
     *
     * @var string|null
     */
    protected $lineColor = '#ffffff';

    /**
     * {@inheritdoc}
     */
    public function getLineColor()
    {
        return $this->lineColor;
    }

    /**
     * {@inheritdoc}
     */
    public function setLineColor($lineColor)
    {
        $this->lineColor = $lineColor;

        return $this;
    }

    /**
     * Line width.
     *
     * @var int
     */
    protected $lineWidth = 0;

    /**
     * {@inheritdoc}
     */
    public function getLineWidth()
    {
        return $this->lineWidth;
    }

    /**
     * {@inheritdoc}
     */
    public function setLineWidth($lineWidth)
    {
        if (false === is_int($lineWidth)) {
            throw new InvalidArgumentException();
        }

        $this->lineWidth = $lineWidth;

        return $this;
    }

    /**
     * Radius.
     *
     * @var int
     */
    protected $radius = 4;

    /**
     * {@inheritdoc}
     */
    public function getRadius()
    {
        return $this->radius;
    }

    /**
     * {@inheritdoc}
     */
    public function setRadius($radius)
    {
        if (false === is_int($radius)) {
            throw new InvalidArgumentException();
        }

        $this->radius = $radius;

        return $this;
    }

    /**
     * Symbol.
     *
     * @var string|null
     */
    protected $symbol;

    /**
     * {@inheritdoc}
     */
    public function getSymbol()
    {
        return $this->symbol;
    }

    /**
     * {@inheritdoc}
     */
    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;

        return $this;
    }

}
