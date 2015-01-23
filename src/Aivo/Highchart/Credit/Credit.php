<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aivo\Highchart\Credit;

use Aivo\Highchart\ChartInterface;
use Aivo\Highchart\Exception\InvalidArgumentException;

/**
 * Chart credits.
 *
 * @author Chris Wilkinson <chris.wilkinson@admin.cam.ac.uk>
 */
class Credit implements CreditInterface
{

    /**
     * Constructor.
     *
     * @param ChartInterface $chart Chart.
     */
    public function __construct(ChartInterface $chart)
    {
        $this->chart = $chart;
    }

    /**
     * Chart.
     *
     * @var ChartInterface
     */
    protected $chart;

    /**
     * {@inheritdoc}
     */
    public function getChart()
    {
        return $this->chart;
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
     * Text.
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
     * URL.
     *
     * @var string
     */
    protected $url;

    /**
     * {@inheritdoc}
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * {@inheritdoc}
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Horizontal alignment.
     *
     * @var string|null
     */
    protected $horizontalAlignment;

    /**
     * {@inheritdoc}
     */
    public function getHorizontalAlignment()
    {
        return $this->horizontalAlignment;
    }

    /**
     * {@inheritdoc}
     */
    public function setHorizontalAlignment($horizontalAlignment)
    {
        $this->horizontalAlignment = $horizontalAlignment;

        return $this;
    }

    /**
     * Vertical alignment.
     *
     * @var string|null
     */
    protected $verticalAlignment;

    /**
     * {@inheritdoc}
     */
    public function getVerticalAlignment()
    {
        return $this->verticalAlignment;
    }

    /**
     * {@inheritdoc}
     */
    public function setVerticalAlignment($verticalAlignment)
    {
        $this->verticalAlignment = $verticalAlignment;

        return $this;
    }

    /**
     * X-position.
     *
     * @var int|null
     */
    protected $xPosition;

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
    public function setXPosition($xPosition)
    {
        if (false === is_int($xPosition) && false === is_null($xPosition)) {
            throw new InvalidArgumentException();
        }

        $this->xPosition = $xPosition;

        return $this;
    }

    /**
     * Y-position.
     *
     * @var int|null
     */
    protected $yPosition;

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
    public function setYPosition($yPosition)
    {
        if (false === is_int($yPosition) && false === is_null($yPosition)) {
            throw new InvalidArgumentException();
        }

        $this->yPosition = $yPosition;

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
