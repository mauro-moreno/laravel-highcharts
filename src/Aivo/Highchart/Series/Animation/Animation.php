<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aivo\Highchart\Series\Animation;

use Aivo\Highchart\Exception\InvalidArgumentException;
use Aivo\Highchart\Series\SeriesInterface;

/**
 * Series animation.
 *
 * @author Chris Wilkinson <chris.wilkinson@admin.cam.ac.uk>
 */
class Animation implements AnimationInterface
{

    /**
     * Series.
     *
     * @var SeriesInterface
     */
    protected $series;

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
     * Duration.
     *
     * @var int|null
     */
    protected $duration;

    /**
     * {@inheritdoc}
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * {@inheritdoc}
     */
    public function setDuration($duration)
    {
        if (false === is_int($duration) && false === is_null($duration)) {
            throw new InvalidArgumentException();
        }

        $this->duration = $duration;

        return $this;
    }

    /**
     * Easing.
     *
     * @var string|null
     */
    protected $easing;

    /**
     * {@inheritdoc}
     */
    public function getEasing()
    {
        return $this->easing;
    }

    /**
     * {@inheritdoc}
     */
    public function setEasing($easing)
    {
        if (false === is_string($easing) && false === is_null($easing)) {
            throw new InvalidArgumentException();
        }

        $this->easing = $easing;

        return $this;
    }

}
