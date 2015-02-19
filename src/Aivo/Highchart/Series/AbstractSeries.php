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

use Aivo\Highchart\Axis\XAxisInterface;
use Aivo\Highchart\Axis\YAxisInterface;
use Aivo\Highchart\DataPoint\DataPoint;
use Aivo\Highchart\DataPoint\DataPointInterface;
use Aivo\Highchart\Exception\InvalidArgumentException;
use Aivo\Highchart\Series\Animation\Animation;
use Aivo\Highchart\Series\Animation\AnimationInterface;
use Aivo\Highchart\Series\Marker\Marker;
use Aivo\Highchart\Series\Marker\MarkerInterface;
use Aivo\Highchart\Series\State\HoverState;
use Aivo\Highchart\Series\State\HoverStateInterface;
use Zend\Json\Expr;

/**
 * Abstract chart series.
 *
 * @author Chris Wilkinson <chris.wilkinson@admin.cam.ac.uk>
 */
abstract class AbstractSeries implements SeriesInterface
{

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->marker = new Marker($this);
        $this->animation = new Animation($this);
    }

    /**
     * Name.
     *
     * @var string|null
     */
    protected $name;

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Color.
     *
     * @var string
     */
    protected $color;

    /**
     * {@inheritdoc}
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * {@inheritdoc}
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Data points.
     *
     * @var DataPointInterface[]
     */
    protected $dataPoints = array();

    /**
     * {@inheritdoc}
     */
    public function getDataPoints()
    {
        return $this->dataPoints;
    }

    /**
     * {@inheritdoc}
     */
    public function addDataPoint(DataPointInterface $dataPoint)
    {
        $this->dataPoints[] = $dataPoint;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function addData(array $data)
    {
        if (null !== $this->xAxis) {
            $categories = array_keys($this->xAxis->getCategories());
        } else {
            $categories = array();
        }

        foreach ($data as $category => $datum) {
            $dataPoint = new DataPoint();

            if (false !== $position = array_search($category, $categories)) {
                $dataPoint->setXValue($position);
            }

            $dataPoint->setYValue($datum);
            $this->addDataPoint($dataPoint);
        }

        return $this;
    }

    /**
     * X-axis.
     *
     * @var XAxisInterface|null
     */
    protected $xAxis;

    /**
     * {@inheritdoc}
     */
    public function getXAxis()
    {
        return $this->xAxis;
    }

    /**
     * {@inheritdoc}
     */
    public function setXAxis($xAxis)
    {
        if (false === $xAxis instanceof XAxisInterface && false === is_null($xAxis)) {
            throw new InvalidArgumentException();
        }

        $this->xAxis = $xAxis;

        return $this;
    }

    /**
     * Y-axis.
     *
     * @var YAxisInterface|null
     */
    protected $yAxis;

    /**
     * {@inheritdoc}
     */
    public function getYAxis()
    {
        return $this->yAxis;
    }

    /**
     * {@inheritdoc}
     */
    public function setYAxis($yAxis)
    {
        if (false === $yAxis instanceof YAxisInterface && false === is_null($yAxis)) {
            throw new InvalidArgumentException();
        }

        $this->yAxis = $yAxis;

        return $this;
    }

    /**
     * Labels formatter.
     *
     * @var Expr|null
     */
    protected $labelsFormatter;

    /**
     * {@inheritdoc}
     */
    public function getLabelsFormatter()
    {
        return $this->labelsFormatter;
    }

    /**
     * {@inheritdoc}
     */
    public function setLabelsFormatter($labelsFormatter)
    {
        if (false === $labelsFormatter instanceof Expr && false === is_null($labelsFormatter)) {
            throw new InvalidArgumentException();
        }

        $this->labelsFormatter = $labelsFormatter;

        return $this;
    }

    /**
     * Marker.
     *
     * @var MarkerInterface
     */
    protected $marker;

    /**
     * {@inheritdoc}
     */
    public function getMarker()
    {
        return $this->marker;
    }

    /**
     * Is enable mouse tracking.
     *
     * @var bool
     */
    protected $enableMouseTracking = true;

    /**
     * {@inheritdoc}
     */
    public function isEnableMouseTracking()
    {
        return $this->enableMouseTracking;
    }

    /**
     * {@inheritdoc}
     */
    public function setEnableMouseTracking($enableMouseTracking = true)
    {
        if (false === is_bool($enableMouseTracking)) {
            throw new InvalidArgumentException();
        }

        $this->enableMouseTracking = $enableMouseTracking;

        return $this;
    }

    /**
     * Cursor.
     *
     * @var string|null
     */
    protected $cursor;

    /**
     * {@inheritdoc}
     */
    public function getCursor()
    {
        return $this->cursor;
    }

    /**
     * {@inheritdoc}
     */
    public function setCursor($cursor)
    {
        $this->cursor = $cursor;

        return $this;
    }

    /**
     * Weight.
     *
     * @var int
     */
    protected $weight = 0;

    /**
     * {@inheritdoc}
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * {@inheritdoc}
     */
    public function setWeight($weight)
    {
        if (false === is_int($weight) && false === is_float($weight)) {
            throw new InvalidArgumentException();
        }

        $this->weight = $weight;

        return $this;
    }

    /**
     * Checkbox click event.
     *
     * @var Expr|null
     */
    protected $checkboxClickEvent;

    /**
     * {@inheritdoc}
     */
    public function getCheckboxClickEvent()
    {
        return $this->checkboxClickEvent;
    }

    /**
     * {@inheritdoc}
     */
    public function setCheckboxClickEvent($event)
    {
        if (false === $event instanceof Expr && false === is_null($event)) {
            throw new InvalidArgumentException();
        }

        $this->checkboxClickEvent = $event;

        return $this;
    }

    /**
     * Click event.
     *
     * @var Expr|null
     */
    protected $clickEvent;

    /**
     * {@inheritdoc}
     */
    public function getClickEvent()
    {
        return $this->clickEvent;
    }

    /**
     * {@inheritdoc}
     */
    public function setClickEvent($event)
    {
        if (false === $event instanceof Expr && false === is_null($event)) {
            throw new InvalidArgumentException();
        }

        $this->clickEvent = $event;

        return $this;
    }

    /**
     *  event.
     *
     * @var Expr|null
     */
    protected $hideEvent;

    /**
     * {@inheritdoc}
     */
    public function getHideEvent()
    {
        return $this->hideEvent;
    }

    /**
     * {@inheritdoc}
     */
    public function setHideEvent($event)
    {
        if (false === $event instanceof Expr && false === is_null($event)) {
            throw new InvalidArgumentException();
        }

        $this->hideEvent = $event;

        return $this;
    }

    /**
     *  event.
     *
     * @var Expr|null
     */
    protected $legendItemClickEvent;

    /**
     * {@inheritdoc}
     */
    public function getLegendItemClickEvent()
    {
        return $this->legendItemClickEvent;
    }

    /**
     * {@inheritdoc}
     */
    public function setLegendItemClickEvent($event)
    {
        if (false === $event instanceof Expr && false === is_null($event)) {
            throw new InvalidArgumentException();
        }

        $this->legendItemClickEvent = $event;

        return $this;
    }

    /**
     * Mouse out event.
     *
     * @var Expr|null
     */
    protected $mouseOutEvent;

    /**
     * {@inheritdoc}
     */
    public function getMouseOutEvent()
    {
        return $this->mouseOutEvent;
    }

    /**
     * {@inheritdoc}
     */
    public function setMouseOutEvent($event)
    {
        if (false === $event instanceof Expr && false === is_null($event)) {
            throw new InvalidArgumentException();
        }

        $this->mouseOutEvent = $event;

        return $this;
    }

    /**
     * Mouse over event.
     *
     * @var Expr|null
     */
    protected $mouseOverEvent;

    /**
     * {@inheritdoc}
     */
    public function getMouseOverEvent()
    {
        return $this->mouseOverEvent;
    }

    /**
     * {@inheritdoc}
     */
    public function setMouseOverEvent($event)
    {
        if (false === $event instanceof Expr && false === is_null($event)) {
            throw new InvalidArgumentException();
        }

        $this->mouseOverEvent = $event;

        return $this;
    }

    /**
     * Show event.
     *
     * @var Expr|null
     */
    protected $showEvent;

    /**
     * {@inheritdoc}
     */
    public function getShowEvent()
    {
        return $this->showEvent;
    }

    /**
     * {@inheritdoc}
     */
    public function setShowEvent($event)
    {
        if (false === $event instanceof Expr && false === is_null($event)) {
            throw new InvalidArgumentException();
        }

        $this->showEvent = $event;

        return $this;
    }

    /**
     * Animation.
     *
     * @var AnimationInterface
     */
    protected $animation;

    /**
     * {@inheritdoc}
     */
    public function getAnimation()
    {
        return $this->animation;
    }

    /**
     * Hover state.
     *
     * @var HoverStateInterface
     */
    protected $hoverState;

    /**
     * {@inheritdoc}
     */
    public function getHoverState()
    {
        if (null === $this->hoverState) {
            $this->hoverState = new HoverState($this);
        }

        return $this->hoverState;
    }

    /**
     * Label Style
     *
     * @var array
     */
    protected $labelStyle = array();

    /**
     * {@inheritdoc}
     */
    public function setLabelStyle($labelStyle)
    {
        $this->labelStyle = $labelStyle;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getLabelStyle()
    {
        return $this->labelStyle;
    }

}
