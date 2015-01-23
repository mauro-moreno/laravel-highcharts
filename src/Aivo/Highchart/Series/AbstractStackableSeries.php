<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aivo\Highchart\Series;

use Aivo\Highchart\Exception\InvalidArgumentException;

/**
 * Abstract stackable chart series.
 *
 * @author Chris Wilkinson <chris.wilkinson@admin.cam.ac.uk>
 */
abstract class AbstractStackableSeries extends AbstractSequentialSeries
    implements StackableSeriesInterface
{

    /**
     * Is stacking.
     *
     * @var bool
     */
    protected $stacking = false;

    /**
     * Is percentage stacking.
     *
     * @var bool
     */
    protected $percentageStacking = false;

    /**
     * {@inheritdoc}
     */
    public function isStacking()
    {
        return $this->stacking;
    }

    /**
     * {@inheritdoc}
     */
    public function isPercentageStacking()
    {
        return false === $this->stacking ? false : $this->percentageStacking;
    }

    /**
     * {@inheritdoc}
     */
    public function setStacking($stacking = true, $percentage = false)
    {
        if (false === is_bool($stacking) || false === is_bool($percentage)) {
            throw new InvalidArgumentException();
        }

        $this->stacking = $stacking;
        $this->percentageStacking = $percentage;

        return $this;
    }

    /**
     * Stacking group.
     *
     * @var string|null
     */
    protected $group;

    /**
     * {@inheritdoc}
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * {@inheritdoc}
     */
    public function setGroup($group)
    {
        $this->group = $group;

        return $this;
    }

}
