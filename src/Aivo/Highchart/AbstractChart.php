<?php

namespace Aivo\Highchart;

use Aivo\Highchart\Axis\XAxisInterface;
use Aivo\Highchart\Axis\YAxisInterface;
use Aivo\Highchart\Credit\Credit;
use Aivo\Highchart\Credit\CreditInterface;
use Aivo\Highchart\Exception\InvalidArgumentException;
use Aivo\Highchart\Series\SeriesInterface;
use Aivo\Highchart\Tooltip\Tooltip;
use Aivo\Highchart\Tooltip\TooltipInterface;
use Aivo\Highchart\Renderer\Renderer;
use Aivo\Highchart\Renderer\RendererInterface;

/**
 * Abstract chart.
 *
 * @author Chris Wilkinson <chris.wilkinson@admin.cam.ac.uk>
 */
abstract class AbstractChart implements ChartInterface
{

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->tooltip = new Tooltip($this);
        $this->credit = new Credit($this);
    }

    /**
     * Title.
     *
     * @var string
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
     * {@inheritdoc}
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Title align.
     *
     * @var string|null
     */
    protected $titleAlign;

    /**
     * {@inheritdoc}
     */
    public function getTitleAlign()
    {
        return $this->titleAlign;
    }

    /**
     * {@inheritdoc}
     */
    public function setTitleAlign($titleAlign = null)
    {
        $this->titleAlign = $titleAlign;

        return $this;
    }

    /**
     * Title vertical align.
     *
     * @var string|null
     */
    protected $titleVAlign;

    /**
     * {@inheritdoc}
     */
    public function getTitleVAlign()
    {
        return $this->titleVAlign;
    }

    /**
     * {@inheritdoc}
     */
    public function setTitleVAlign($titleVAlign = null)
    {
        $this->titleVAlign = $titleVAlign;

        return $this;
    }

    /**
     * Title Y.
     *
     * @var int
     */
    protected $titleY;

    /**
     * {@inheritdoc}
     */
    public function getTitleY()
    {
        return $this->titleY;
    }

    /**
     * {@inheritdoc}
     */
    public function setTitleY($titleY)
    {
        $this->titleY = (int) $titleY;

        return $this;
    }

    /**
     * Subtitle.
     *
     * @var string
     */
    protected $subtitle;

    /**
     * {@inheritdoc}
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * {@inheritdoc}
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * X-axes.
     *
     * @var XAxisInterface[]
     */
    protected $xAxes = array();

    /**
     * {@inheritdoc}
     */
    public function addXAxis(XAxisInterface $xAxis)
    {
        $this->xAxes[] = $xAxis;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getXAxes()
    {
        return $this->xAxes;
    }

    /**
     * {@inheritdoc}
     */
    public function getXAxis($key)
    {
        return array_key_exists($key, $this->xAxes) ? $this->xAxes[$key] : null;
    }

    /**
     * Y-axes.
     *
     * @var YAxisInterface[]
     */
    protected $yAxes = array();

    /**
     * {@inheritdoc}
     */
    public function addYAxis(YAxisInterface $yAxis)
    {
        $this->yAxes[] = $yAxis;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getYAxes()
    {
        return $this->yAxes;
    }

    /**
     * {@inheritdoc}
     */
    public function getYAxis($key)
    {
        return array_key_exists($key, $this->yAxes) ? $this->yAxes[$key] : null;
    }

    /**
     * Series.
     *
     * @var SeriesInterface[]
     */
    protected $series = array();

    /**
     * {@inheritdoc}
     */
    public function addSeries($series)
    {
        if (false === is_array($series)) {
            $series = array($series);
        }

        foreach ($series as $individualSeries) {
            if (false === $individualSeries instanceof SeriesInterface) {
                throw new InvalidArgumentException();
            }
        }

        $this->series = array_merge($this->series, array_values($series));

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * {@inheritdoc}
     */
    public function clearSeries()
    {
        $this->series = array();

        return $this;
    }

    /**
     * Whether to show the legend.
     *
     * @var bool
     */
    protected $legend = true;

    /**
     * {@inheritdoc}
     */
    public function hasLegend()
    {
        return $this->legend;
    }

    /**
     * {@inheritdoc}
     */
    public function setLegend($legend = true)
    {
        if (false === is_bool($legend)) {
            throw new InvalidArgumentException();
        }

        $this->legend = $legend;

        return $this;
    }

    /**
     * Tooltip.
     *
     * @var TooltipInterface
     */
    protected $tooltip;

    /**
     * {@inheritdoc}
     */
    public function getTooltip()
    {
        return $this->tooltip;
    }

    /**
     * Credit.
     *
     * @var CreditInterface
     */
    protected $credit;

    /**
     * {@inheritdoc}
     */
    public function getCredit()
    {
        return $this->credit;
    }

    /**
     * Extra.
     *
     * @var string
     */
    protected $extra;

    /**
     * {@inheritdoc}
     */
    public function getExtra()
    {
        return $this->extra;
    }

    /**
     * {@inheritdoc}
     */
    public function setExtra($extra = null)
    {
        $this->extra = $extra;

        return $this;
    }

    /**
     * Render
     *
     * @return array
     */
    public function render()
    {
        $renderer = new Renderer();

        return $renderer->render($this);
    }

}
