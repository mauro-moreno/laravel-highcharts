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
use Aivo\Highchart\Series\State\SolidHoverState;
use Aivo\Highchart\Series\State\SolidHoverStateInterface;

/**
 * Pie series.
 *
 * @author Chris Wilkinson <chris.wilkinson@admin.cam.ac.uk>
 */
class PieSeries extends AbstractSeries implements PieSeriesInterface
{

    /**
     * Factory method.
     *
     * @return PieSeriesInterface New pie series.
     */
    public static function factory()
    {
        return new self();
    }

    /**
     * X-position.
     *
     * @var int|null
     */
    protected $xPosition;

    /**
     * Is x-position a percentage.
     *
     * @var bool
     */
    protected $xPositionPercentage = false;

    /**
     * {@inheritdoc}
     */
    public function getXPosition()
    {
        return $this->xPosition;
    }

    /**
     * {@inheritdoc}
     */
    public function isXPositionAPercentage()
    {
        return $this->xPositionPercentage;
    }

    /**
     * {@inheritdoc}
     */
    public function setXPosition($xPosition, $percentage = false)
    {
        if ((false === is_int($xPosition) && false === is_null($xPosition))
                || false === is_bool($percentage)) {
            throw new InvalidArgumentException();
        }

        $this->xPosition = $xPosition;
        $this->xPositionPercentage = $percentage;

        return $this;
    }

    /**
     * Y-position.
     *
     * @var int|null
     */
    protected $yPosition;

    /**
     * Is y-position a percentage.
     *
     * @var bool
     */
    protected $yPositionPercentage = false;

    /**
     * {@inheritdoc}
     */
    public function getYPosition()
    {
        return $this->yPosition;
    }

    /**
     * {@inheritdoc}
     */
    public function isYPositionAPercentage()
    {
        return $this->yPositionPercentage;
    }

    /**
     * {@inheritdoc}
     */
    public function setYPosition($yPosition, $percentage = false)
    {
        if ((false === is_int($yPosition) && false === is_null($yPosition)) || false === is_bool($percentage)) {
            throw new InvalidArgumentException();
        }

        $this->yPosition = $yPosition;
        $this->yPositionPercentage = $percentage;

        return $this;
    }

    /**
     * Size.
     *
     * @var int
     */
    protected $size;

    /**
     * Is size a percentage.
     *
     * @var bool
     */
    protected $sizePercentage = false;

    /**
     * {@inheritdoc}
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * {@inheritdoc}
     */
    public function isSizeAPercentage()
    {
        return $this->sizePercentage;
    }

    /**
     * {@inheritdoc}
     */
    public function setSize($size, $percentage = false)
    {
        if ((false === is_int($size) && false === is_null($size)) || false === is_bool($percentage)) {
            throw new InvalidArgumentException();
        }

        $this->size = $size;
        $this->sizePercentage = $percentage;

        return $this;
    }

    /**
     * Labels distance.
     *
     * @var int
     */
    protected $labelsDistance;

    /**
     * {@inheritdoc}
     */
    public function getLabelsDistance()
    {
        return $this->labelsDistance;
    }

    /**
     * {@inheritdoc}
     */
    public function setLabelsDistance($labelsDistance)
    {
        if (false === is_int($labelsDistance) && false === is_null($labelsDistance)) {
            throw new InvalidArgumentException();
        }

        $this->labelsDistance = $labelsDistance;

        return $this;
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

    /**
     * $innerSize
     *
     * @var float|null
     */
    protected $innerSize;

    /**
     * {@inheritdoc}
     */
    public function setInnerSize($size, $percentage = true)
    {
        if ($size !== null) {
            if ($percentage === true) {
                $this->innerSize = ((float) $size) . '%';
            } else {
                $this->innerSize = (float) $size;
            }
        } else {
            $this->innerSize = null;
        }

        return $this;

    }

    /**
     * {@inheritdoc}
     */
    public function getInnerSize() {
        return $this->innerSize;
    }

    /**
     * $startAngle
     *
     * @var float|null
     */
    protected $startAngle;

    /**
     * {@inheritdoc}
     */
    public function setStartAngle($angle)
    {
        if ($angle !== null) {
            $this->startAngle = (float) $angle;
        } else {
            $this->startAngle = null;
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getStartAngle() {
        return $this->startAngle;
    }

    /**
     * $endAngle
     *
     * @var float|null
     */
    protected $endAngle;

    /**
     * {@inheritdoc}
     */
    public function setEndAngle($angle)
    {
        if ($angle !== null) {
            $this->endAngle = (float) $angle;
        } else {
            $this->endAngle = null;
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getEndAngle() {
        return $this->endAngle;
    }

}
