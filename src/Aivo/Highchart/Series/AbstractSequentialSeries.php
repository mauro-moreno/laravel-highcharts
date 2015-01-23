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
 * Abstract sequential chart series.
 *
 * @author Chris Wilkinson <chris.wilkinson@admin.cam.ac.uk>
 */
abstract class AbstractSequentialSeries extends AbstractSeries
    implements SequentialSeriesInterface
{

    protected $pointStart;

    /**
     * {@inheritdoc}
     */
    public function getPointStart()
    {
        return $this->pointStart;
    }

    /**
     * {@inheritdoc}
     */
    public function setPointStart($pointStart)
    {
        if (false === is_int($pointStart) && false === is_null($pointStart)) {
            throw new InvalidArgumentException();
        }

        $this->pointStart = $pointStart;

        return $this;
    }

}
