<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aivo\Highchart\Axis;

use Aivo\Highchart\Axis\Label\Label;
use Aivo\Highchart\Axis\Label\LabelInterface;
use Aivo\Highchart\Axis\Title\Title;
use Aivo\Highchart\Axis\Title\TitleInterface;
use Aivo\Highchart\Exception\InvalidArgumentException;

/**
 * Abstract axis.
 *
 * @author Chris Wilkinson <chris.wilkinson@admin.cam.ac.uk>
 */
abstract class AbstractAxis implements AxisInterface
{

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->title = new Title($this);
        $this->label = new Label($this);
    }

    /**
     * Title.
     *
     * @var TitleInterface
     */
    protected $title;

    /**
     * {@inheritdoc}
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Label.
     *
     * @var LabelInterface
     */
    protected $label;

    /**
     * {@inheritdoc}
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Categories.
     *
     * @var array
     */
    protected $categories = array();

    /**
     * {@inheritdoc}
     */
    public function getCategory($id)
    {
        return array_key_exists($id, $this->categories) ? $this->categories[$id] : null;
    }

    /**
     * {@inheritdoc}
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * {@inheritdoc}
     */
    public function addCategory($id, $name)
    {
        $this->categories[$id] = $name;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function addCategories(array $categories)
    {
        $this->categories += $categories;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function clearCategories()
    {
        $this->categories = array();

        return $this;
    }

    /**
     * Maximum value.
     *
     * @var int|float|null
     */
    protected $maxValue;

    /**
     * {@inheritdoc}
     */
    public function getMaxValue()
    {
        return $this->maxValue;
    }

    /**
     * {@inheritdoc}
     */
    public function setMaxValue($maxValue)
    {
        if (false === is_int($maxValue) && false === is_float($maxValue) && false === is_null($maxValue)) {
            throw new InvalidArgumentException();
        }

        $this->maxValue = $maxValue;

        return $this;
    }

    /**
     * Minimum value.
     *
     * @var int|float|null
     */
    protected $minValue;

    /**
     * {@inheritdoc}
     */
    public function getMinValue()
    {
        return $this->minValue;
    }

    /**
     * {@inheritdoc}
     */
    public function setMinValue($minValue)
    {
        if (false === is_int($minValue) && false === is_float($minValue) && false === is_null($minValue)) {
            throw new InvalidArgumentException();
        }

        $this->minValue = $minValue;

        return $this;
    }

    /**
     * Is opposite.
     *
     * @var bool
     */
    protected $opposite = false;

    /**
     * {@inheritdoc}
     */
    public function isOpposite()
    {
        return $this->opposite;
    }

    /**
     * {@inheritdoc}
     */
    public function setOpposite($opposite = true)
    {
        if (false === is_bool($opposite)) {
            throw new InvalidArgumentException();
        }

        $this->opposite = $opposite;

        return $this;
    }

    /**
     * Tick width.
     *
     * @var int
     */
    protected $tickWidth = 0;

    /**
     * {@inheritdoc}
     */
    public function getTickWidth()
    {
        return $this->tickWidth;
    }

    /**
     * {@inheritdoc}
     */
    public function setTickWidth($tickWidth)
    {
        if (false === is_int($tickWidth)) {
            throw new InvalidArgumentException();
        }

        $this->tickWidth = $tickWidth;

        return $this;
    }

    /**
     * Grid line width.
     *
     * @var int
     */
    protected $gridLineWidth = 0;

    /**
     * {@inheritdoc}
     */
    public function getGridLineWidth()
    {
        return $this->gridLineWidth;
    }

    /**
     * {@inheritdoc}
     */
    public function setGridLineWidth($gridLineWidth)
    {
        if (false === is_int($gridLineWidth)) {
            throw new InvalidArgumentException();
        }

        $this->gridLineWidth = $gridLineWidth;

        return $this;
    }

    /**
     * Is reversed.
     *
     * @var bool
     */
    protected $reversed = false;

    /**
     * {@inheritdoc}
     */
    public function isReversed()
    {
        return $this->reversed;
    }

    /**
     * {@inheritdoc}
     */
    public function setReversed($reversed = true)
    {
        if (false === is_bool($reversed)) {
            throw new InvalidArgumentException();
        }

        $this->reversed = $reversed;

        return $this;
    }

}
