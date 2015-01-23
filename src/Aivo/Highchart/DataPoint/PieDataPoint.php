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
 * Pie-chart data point.
 *
 * Chris Wilkinson <chris.wilkinson@admin.cam.ac.uk>
 */
class PieDataPoint extends AbstractDataPoint implements PieDataPointInterface
{

    /**
     * Factory method.
     *
     * @return PieDataPointInterface New pie data point.
     */
    public static function factory()
    {
        return new self();
    }

    /**
     * Is sliced.
     *
     * @var bool
     */
    protected $sliced = false;

    /**
     * {@inheritdoc}
     */
    public function isSliced()
    {
        return $this->sliced;
    }

    /**
     * {@inheritdoc}
     */
    public function setSliced($sliced = true)
    {
        if (false === is_bool($sliced)) {
            throw new InvalidArgumentException();
        }

        $this->sliced = $sliced;

        return $this;
    }

}
