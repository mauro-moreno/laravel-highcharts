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
use Aivo\Highchart\DataPoint\DataPointInterface;
use Aivo\Highchart\Exception\InvalidArgumentException;
use Aivo\Highchart\Series\Animation\AnimationInterface;
use Aivo\Highchart\Series\Marker\MarkerInterface;
use Aivo\Highchart\Series\State\HoverStateInterface;

/**
 * Chart series.
 *
 * Do not implement this interface directly.
 *
 * @author Chris Wilkinson <chris.wilkinson@admin.cam.ac.uk>
 */
interface SeriesInterface
{

    /**
     * Gets the series name.
     *
     * @return string|null Name, or `null` if not set.
     */
    public function getName();

    /**
     * Sets the series name.
     *
     * @param string|null $name Name, or `null` to remove the existing value.
     *
     * @return self Reference to the series.
     */
    public function setName($name);

    /**
     * Gets the color.
     *
     * @return string Color, or `null` if not set.
     */
    public function getColor();

    /**
     * Sets the color.
     *
     * @param string|null $color Color, or `null` to remove the existing value.
     *
     * @return self Reference to the series.
     */
    public function setColor($color);

    /**
     * Gets the data points.
     *
     * @return DataPointInterface[] Data points.
     */
    public function getDataPoints();

    /**
     * Adds a data point.
     *
     * @param DataPointInterface $dataPoint Data point.
     *
     * @return self Reference to the series.
     */
    public function addDataPoint(DataPointInterface $dataPoint);

    /**
     * Adds data.
     *
     * @param array $data Data.
     *
     * @return self Reference to the series.
     */
    public function addData(array $data);

    /**
     * Gets the x-axis that the series is connected to.
     *
     * @return XAxisInterface X-axis, or `null` if not set.
     */
    public function getXAxis();

    /**
     * Sets the x-axis that the series is connected to.
     *
     * @param XAxisInterface|null $xAxis X-axis, or `null` to remove the existing value.
     *
     * @return self Reference to the series.
     *
     * @throws InvalidArgumentException If an argument is invalid.
     */
    public function setXAxis($xAxis);

    /**
     * Gets the y-axis that the series is connected to.
     *
     * @return YAxisInterface Y-axis, or `null` if not set.
     */
    public function getYAxis();

    /**
     * Sets the y-axis that the series is connected to.
     *
     * @param YAxisInterface|null $yAxis Y-axis, or `null` to remove the existing value.
     *
     * @return self Reference to the series.
     *
     * @throws InvalidArgumentException If an argument is invalid.
     */
    public function setYAxis($yAxis);

    /**
     * Gets the labels formatter.
     *
     * @return Expr|null Labels formatter, or `null` if not set.
     */
    public function getLabelsFormatter();

    /**
     * Sets the labels formatter.
     *
     * @param Expr|null $labelsFormatter Labels formatter, or `null` to remove the existing value.
     *
     * @return self Reference to the series.
     *
     * @throws InvalidArgumentException If an argument is invalid.
     */
    public function setLabelsFormatter($labelsFormatter);

    /**
     * Gets the marker.
     *
     * @return MarkerInterface Marker.
     */
    public function getMarker();

    /**
     * Is enable mouse tracking.
     *
     * @return bool `true` if enabled, otherwise `false.
     */
    public function isEnableMouseTracking();

    /**
     * Sets enable mouse tracking.
     *
     * @param bool $enabledMouseTracking `true` if enabled, otherwise `false.
     *
     * @return self Reference to the series.
     *
     * @throws InvalidArgumentException If an argument is invalid.
     */
    public function setEnableMouseTracking($enabledMouseTracking = true);

    /**
     * Gets the cursor.
     *
     * @return string|null Cursor, or `null` if not set.
     */
    public function getCursor();

    /**
     * Sets the cursor.
     *
     * @param string|null $cursor Cursor, or `null` to remove the existing value.
     *
     * @return self Reference to the series.
     */
    public function setCursor($cursor);

    /**
     * Gets the weight.
     *
     * @return int|float Weight.
     */
    public function getWeight();

    /**
     * Sets the weight.
     *
     * The weight determines the order in which the series appear. Higher
     * values appear first.
     *
     * If two series have the same weight, it is assumed that the order is not
     * important.
     *
     * @param int|float $weight Weight.
     *
     * @return self Reference to the series.
     *
     * @throws InvalidArgumentException If an argument is invalid.
     */
    public function setWeight($weight);

    /**
     * Gets the checkbox click event.
     *
     * @return Expr|null Event, or `null` if not set.
     */
    public function getCheckboxClickEvent();

    /**
     * Sets the checkbox click event.
     *
     * @param Expr|null $event Event, or `null` to remove the existing value.
     *
     * @return self Reference to the series.
     *
     * @throws InvalidArgumentException If an argument is invalid.
     */
    public function setCheckboxClickEvent($event);

    /**
     * Gets the click event.
     *
     * @return Expr|null Event, or `null` if not set.
     */
    public function getClickEvent();

    /**
     * Sets the click event.
     *
     * @param Expr|null $event Event, or `null` to remove the existing value.
     *
     * @return self Reference to the series.
     *
     * @throws InvalidArgumentException If an argument is invalid.
     */
    public function setClickEvent($event);

    /**
     * Gets the hide event.
     *
     * @return Expr|null Event, or `null` if not set.
     */
    public function getHideEvent();

    /**
     * Sets the hide event.
     *
     * @param Expr|null $event Event, or `null` to remove the existing value.
     *
     * @return self Reference to the series.
     *
     * @throws InvalidArgumentException If an argument is invalid.
     */
    public function setHideEvent($event);

    /**
     * Gets the legend item click event.
     *
     * @return Expr|null Event, or `null` if not set.
     */
    public function getLegendItemClickEvent();

    /**
     * Sets the legend item click event.
     *
     * @param Expr|null $event Event, or `null` to remove the existing value.
     *
     * @return self Reference to the series.
     *
     * @throws InvalidArgumentException If an argument is invalid.
     */
    public function setLegendItemClickEvent($event);

    /**
     * Gets the mouse out event.
     *
     * @return Expr|null Event, or `null` if not set.
     */
    public function getMouseOutEvent();

    /**
     * Sets the mouse out event.
     *
     * @param Expr|null $event Event, or `null` to remove the existing value.
     *
     * @return self Reference to the series.
     *
     * @throws InvalidArgumentException If an argument is invalid.
     */
    public function setMouseOutEvent($event);

    /**
     * Gets the mouse over event.
     *
     * @return Expr|null Event, or `null` if not set.
     */
    public function getMouseOverEvent();

    /**
     * Sets the mouse over event.
     *
     * @param Expr|null $event Event, or `null` to remove the existing value.
     *
     * @return self Reference to the series.
     *
     * @throws InvalidArgumentException If an argument is invalid.
     */
    public function setMouseOverEvent($event);

    /**
     * Gets the show event.
     *
     * @return Expr|null Event, or `null` if not set.
     */
    public function getShowEvent();

    /**
     * Sets the show event.
     *
     * @param Expr|null $event Event, or `null` to remove the existing value.
     *
     * @return self Reference to the series.
     *
     * @throws InvalidArgumentException If an argument is invalid.
     */
    public function setShowEvent($event);

    /**
     * Gets the animation.
     *
     * @return AnimationInterface Animation.
     */
    public function getAnimation();

    /**
     * Gets the hover state.
     *
     * @return HoverStateInterface Hover state.
     */
    public function getHoverState();

    /**
     * Add label styles
     *
     * @param array $labelStyle.
     *
     * @return self Reference to the chart.
     */
    public function setLabelStyle($labelStyle);

    /**
     * Gets the label styles.
     *
     * @return array label style.
     */
    public function getLabelStyle();

}
