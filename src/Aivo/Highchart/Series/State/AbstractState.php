<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aivo\Highchart\Series\State;

use Aivo\Highchart\Exception\InvalidArgumentException;
use Aivo\Highchart\Series\Marker\Marker;
use Aivo\Highchart\Series\SeriesInterface;

/**
 * Abstract state.
 *
 * @author Chris Wilkinson <chris.wilkinson@admin.cam.ac.uk>
 */
abstract class AbstractState implements StateInterface
{

    /**
     * Constructor.
     *
     * @param SeriesInterface $series Series.
     */
    public function __construct(SeriesInterface $series)
    {
        $this->series = $series;
        $this->marker = new Marker($series);
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
            throw new InvalidArgumentException();
        }

        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Line width.
     *
     * @var int|null
     */
    protected $lineWidth;

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
        if (false === is_int($lineWidth) && false === is_null($lineWidth)) {
            throw new InvalidArgumentException();
        }

        $this->lineWidth = $lineWidth;

        return $this;
    }

    /**
     * Marker.
     *
     * @var Marker
     */
    protected $marker;

    /**
     * {@inheritdoc}
     */
    public function getMarker()
    {
        return $this->marker;
    }

}
