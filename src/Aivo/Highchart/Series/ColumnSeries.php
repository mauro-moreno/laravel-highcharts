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

use Aivo\Highchart\Series\State\SolidHoverState;
use Aivo\Highchart\Series\State\SolidHoverStateInterface;

/**
 * Column chart series.
 *
 * @author Chris Wilkinson <chris.wilkinson@admin.cam.ac.uk>
 */
class ColumnSeries extends AbstractStackableSeries
    implements ColumnSeriesInterface
{

    /**
     * Factory method.
     *
     * @return ColumnSeriesInterface New column series.
     */
    public static function factory()
    {
        return new self();
    }

    /**
     * Hover state.
     *
     * @var SolidHoverStateInterface
     */
    protected $hoverState;

    /**
     * {@inheritdoc}
     */
    public function getHoverState()
    {
        if (null === $this->hoverState) {
            $this->hoverState = new SolidHoverState($this);
        }

        return $this->hoverState;
    }

}
