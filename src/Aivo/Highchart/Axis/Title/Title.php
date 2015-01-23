<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aivo\Highchart\Axis\Title;

use Aivo\Highchart\Axis\AxisInterface;
use Aivo\Highchart\Exception\InvalidArgumentException;

/**
 * Axis title.
 *
 * @author Chris Wilkinson <chris.wilkinson@admin.cam.ac.uk>
 */
class Title implements TitleInterface
{

    /**
     * Constructor.
     *
     * @param AxisInterface $axis Axis.
     */
    public function __construct(AxisInterface $axis)
    {
        $this->axis = $axis;
    }

    /**
     * Axis.
     *
     * @var AxisInterface
     */
    protected $axis;

    /**
     * Gets the axis.
     *
     * @return AxisInterface Axis.
     */
    public function getAxis()
    {
        return $this->axis;
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
     * Text
     *
     * @var string|null
     */
    protected $text;

    /**
     * {@inheritdoc}
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * {@inheritdoc}
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Styles.
     *
     * @var array
     */
    protected $styles = array();

    /**
     * {@inheritdoc}
     */
    public function getStyle($key)
    {
        return array_key_exists($key, $this->styles) ? $this->styles[$key] : null;
    }

    /**
     * {@inheritdoc}
     */
    public function getStyles()
    {
        return $this->styles;
    }

    /**
     * {@inheritdoc}
     */
    public function setStyle($key, $value)
    {
        $this->styles[$key] = $value;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setStyles(array $styles)
    {
        $this->styles = $styles;

        return $this;
    }

}
