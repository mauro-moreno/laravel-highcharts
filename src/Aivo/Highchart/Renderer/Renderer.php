<?php

/*
 * This file is part of the PHP Highcharts library.
 *
 * (c) University of Cambridge
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aivo\Highchart\Renderer;

use Aivo\Highchart\Axis\AxisInterface;
use Aivo\Highchart\Axis\XAxisInterface;
use Aivo\Highchart\Axis\YAxisInterface;
use Aivo\Highchart\ChartInterface;
use Aivo\Highchart\DataPoint\DataPointInterface;
use Aivo\Highchart\DataPoint\PieDataPointInterface;
use Aivo\Highchart\Exception\UnexpectedValueException;
use Aivo\Highchart\Renderer\Event\OrderedSeriesEvent;
use Aivo\Highchart\Renderer\Event\RenderEvent;
use Aivo\Highchart\Series\AreaSeriesInterface;
use Aivo\Highchart\Series\AreaSplineSeriesInterface;
use Aivo\Highchart\Series\BarSeriesInterface;
use Aivo\Highchart\Series\ColumnSeriesInterface;
use Aivo\Highchart\Series\LineSeriesInterface;
use Aivo\Highchart\Series\Marker\MarkerInterface;
use Aivo\Highchart\Series\PieSeriesInterface;
use Aivo\Highchart\Series\ScatterSeriesInterface;
use Aivo\Highchart\Series\SequentialSeriesInterface;
use Aivo\Highchart\Series\SeriesInterface;
use Aivo\Highchart\Series\SplineSeriesInterface;
use Aivo\Highchart\Series\StackableSeriesInterface;
use Aivo\Highchart\Series\State\SolidHoverStateInterface;
use Aivo\Highchart\Tooltip\TooltipInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class Renderer implements RendererInterface
{

    /**
     * Event dispatcher.
     *
     * @var EventDispatcherInterface|null
     */
    protected $dispatcher;

    /**
     * {@inheritdoc}
     */
    public function getDispatcher()
    {
        return $this->dispatcher;
    }

    /**
     * {@inheritdoc}
     */
    public function setDispatcher(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * {@inheritdoc}
     */
    public function render(ChartInterface $chart)
    {
        if (null !== $this->dispatcher) {
            $event = new RenderEvent($chart);
            $this->dispatcher->dispatch('highcharts.render', $event);
        }

        $options = $this->renderChart($chart);

        return $options;
    }

    /**
     * Renders a chart.
     *
     * @param ChartInterface $chart Chart.
     *
     * @return array Options.
     */
    protected function renderChart(ChartInterface $chart)
    {

        $options = array(
            'title' => array(
                'text' => $chart->getTitle(),
                'align' => $chart->getTitleAlign(),
                'verticalAlign' => $chart->getTitleVAlign(),
                'y' => $chart->getTitleY()
            ),
            'subtitle' => array(
                'text' => $chart->getSubtitle(),
            ),
            'legend' => array(
                'enabled' => $chart->hasLegend(),
            ),
            'tooltip' => $this->renderTooltip($chart->getTooltip()),
            'extra' => $chart->getExtra(),
        );

        $seriesGroups = array();

        foreach ($chart->getSeries() as $series) {
            if (false === array_key_exists((string) $series->getWeight(), $seriesGroups)) {
                $seriesGroups[(string) $series->getWeight()] = array();
            }

            $seriesGroups[(string) $series->getWeight()][] = $series;
        }

        krsort($seriesGroups);

        $orderedSeries = array();

        foreach ($seriesGroups as $seriesGroup) {
            foreach ($seriesGroup as $series) {
                $orderedSeries[] = $series;
            }
        }

        if (null !== $this->dispatcher) {
            $event = new OrderedSeriesEvent($chart, $orderedSeries);
            $this->dispatcher->dispatch('highcharts.ordered_series', $event);
            $orderedSeries = $event->series;
        }

        foreach ($orderedSeries as $series) {
            $options['series'][] = $this->renderSeries($series);
        }

        $xAxes = $chart->getXAxes();
        if (count($xAxes) === 1) {
            $options['xAxis'] = $this->renderAxis($xAxes[0]);
        } else {
            foreach ($xAxes as $xAxis) {
                $options['xAxis'][] = $this->renderAxis($xAxis);
            }
        }

        $yAxes = $chart->getYAxes();
        if (count($yAxes) === 1) {
            $options['yAxis'] = $this->renderAxis($yAxes[0]);
        } else {
            foreach ($yAxes as $yAxis) {
                $options['yAxis'][] = $this->renderAxis($yAxis);
            }
        }

        $xAxes = array_values($chart->getXAxes());
        array_walk_recursive(
                $options, function (&$value) use ($xAxes) {
            if (false === $value instanceof XAxisInterface) {
                return;
            }

            $value = array_search($value, $xAxes, true);
        }
        );

        $yAxes = array_values($chart->getYAxes());
        array_walk_recursive(
                $options, function (&$value) use ($yAxes) {
            if (false === $value instanceof YAxisInterface) {
                return;
            }

            $value = array_search($value, $yAxes, true);
        }
        );

        $credits = array(
            'enabled' => $chart->getCredit()->isEnabled(),
        );

        if (null !== $chart->getCredit()->getText()) {
            $credits['text'] = $chart->getCredit()->getText();
        }
        if (null !== $chart->getCredit()->getUrl()) {
            $credits['href'] = $chart->getCredit()->getUrl();
        }
        if (null !== $chart->getCredit()->getHorizontalAlignment()) {
            $credits['position']['align'] = $chart->getCredit()->getHorizontalAlignment();
        }
        if (null !== $chart->getCredit()->getVerticalAlignment()) {
            $credits['position']['verticalAlign'] = $chart->getCredit()->getVerticalAlignment();
        }
        if (null !== $chart->getCredit()->getXPosition()) {
            $credits['position']['x'] = $chart->getCredit()->getXPosition();
        }
        if (null !== $chart->getCredit()->getYPosition()) {
            $credits['position']['y'] = $chart->getCredit()->getYPosition();
        }
        if (0 < count($chart->getCredit()->getStyles())) {
            $credits['style'] = $chart->getCredit()->getStyles();
        }

        $options['credits'] = $credits;

        return $options;
    }

    /**
     * Renders the tooltip.
     *
     * @param TooltipInterface $tooltip Tooltip.
     *
     * @return array Options.
     */
    protected function renderTooltip(TooltipInterface $tooltip)
    {
        $options = array(
            'enabled' => $tooltip->isEnabled(),
        );

        if (0 < count($tooltip->getStyles())) {
            $options['style'] = $tooltip->getStyles();
        }

        return $options;
    }

    /**
     * Renders an axis.
     *
     * @param AxisInterface $axis Axis.
     *
     * @return array Options.
     */
    protected function renderAxis(AxisInterface $axis)
    {
        $options = array(
            'opposite' => $axis->isOpposite(),
            'reversed' => $axis->isReversed(),
            'showFirstLabel' => $axis->getLabel()->isShowFirst(),
            'showLastLabel' => $axis->getLabel()->isShowLast(),
        );

        if (0 < count($axis->getCategories())) {
            $options['categories'] = array_values($axis->getCategories());
        }
        if (null !== $axis->getMaxValue()) {
            $options['max'] = $axis->getMaxValue();
        }
        if (null !== $axis->getMinValue()) {
            $options['min'] = $axis->getMinValue();
        }

        if (false === $axis->getTitle()->isEnabled()) {
            $options['title']['text'] = null;
        } else {
            if (null !== $axis->getTitle()->getText()) {
                $options['title']['text'] = $axis->getTitle()->getText();
            }
            if (0 < count($axis->getTitle()->getStyles())) {
                $options['title']['style'] = $axis->getTitle()->getStyles();
            }
        }

        $options['labels'] = array(
            'enabled' => $axis->getLabel()->isEnabled(),
        );
        if (null !== $axis->getLabel()->getAlign()) {
            $options['labels']['align'] = $axis->getLabel()->getAlign();
        }
        if (0 < count($axis->getLabel()->getStyles())) {
            $options['labels']['style'] = $axis->getLabel()->getStyles();
        }
        if (null !== $axis->getLabel()->getXOffset()) {
            $options['labels']['x'] = $axis->getLabel()->getXOffset();
        }
        if (null !== $axis->getLabel()->getYOffset()) {
            $options['labels']['y'] = $axis->getLabel()->getYOffset();
        }
        $options['tickWidth'] = $axis->getTickWidth();
        $options['gridLineWidth'] = $axis->getGridLineWidth();

        return $options;
    }

    /**
     * Renders a series.
     *
     * @param SeriesInterface $series Series.
     *
     * @return array Options.
     *
     * @throws UnexpectedValueException
     */
    protected function renderSeries(SeriesInterface $series)
    {
        if ($series instanceof AreaSeriesInterface) {
            $type = 'area';
        } elseif ($series instanceof AreaSplineSeriesInterface) {
            $type = 'areaspline';
        } elseif ($series instanceof BarSeriesInterface) {
            $type = 'bar';
        } elseif ($series instanceof ColumnSeriesInterface) {
            $type = 'column';
        } elseif ($series instanceof LineSeriesInterface) {
            $type = 'line';
        } elseif ($series instanceof PieSeriesInterface) {
            $type = 'pie';
        } elseif ($series instanceof ScatterSeriesInterface) {
            $type = 'scatter';
        } elseif ($series instanceof SplineSeriesInterface) {
            $type = 'spline';
        } else {
            throw new UnexpectedValueException();
        }

        $options['type'] = $type;

        if (null !== $series->getName()) {
            $options['name'] = $series->getName();
        }
        if (null !== $series->getColor()) {
            $options['color'] = $series->getColor();
        }
        if (null !== $series->getXAxis()) {
            $options['xAxis'] = $series->getXAxis();
        }
        if (null !== $series->getYAxis()) {
            $options['yAxis'] = $series->getYAxis();
        }

        foreach ($series->getDataPoints() as $dataPoint) {
            $options['data'][] = $this->renderDataPoint($dataPoint);
        }

        $options['marker'] = $this->renderMarker($series->getMarker());
        $options['enableMouseTracking'] = $series->isEnableMouseTracking();

        if (null !== $series->getCursor()) {
            $options['cursor'] = $series->getCursor();
        }

        if ($series instanceof SequentialSeriesInterface) {
            $options['pointStart'] = $series->getPointStart();
        }
        if ($series instanceof StackableSeriesInterface) {
            if (true === $series->isStacking()) {
                if (true === $series->isPercentageStacking()) {
                    $options['stacking'] = 'percent';
                } else {
                    $options['stacking'] = 'normal';
                }
            }
        }

        $events = array();

        if (null !== $series->getCheckboxClickEvent()) {
            $events['checkboxClick'] = $series->getCheckboxClickEvent();
        }
        if (null !== $series->getClickEvent()) {
            $events['click'] = $series->getClickEvent();
        }
        if (null !== $series->getHideEvent()) {
            $events['hide'] = $series->getHideEvent();
        }
        if (null !== $series->getLegendItemClickEvent()) {
            $events['legendItemClick'] = $series->getLegendItemClickEvent();
        }
        if (null !== $series->getMouseOutEvent()) {
            $events['mouseOut'] = $series->getMouseOutEvent();
        }
        if (null !== $series->getMouseOverEvent()) {
            $events['mouseOver'] = $series->getMouseOverEvent();
        }
        if (null !== $series->getShowEvent()) {
            $events['show'] = $series->getShowEvent();
        }

        if (count($events) > 0) {
            $options['events'] = $events;
        }

        if (false === $series->getAnimation()->isEnabled()) {
            $options['animation'] = false;
        } else {
            $animation = array();

            if (null !== $series->getAnimation()->getDuration()) {
                $animation['duration'] = $series->getAnimation()->getDuration();
            }
            if (null !== $series->getAnimation()->getEasing()) {
                $animation['easing'] = $series->getAnimation()->getEasing();
            }

            if (count($animation) > 0) {
                $options['animation'] = $animation;
            }
        }

        if ($series instanceof PieSeriesInterface) {
            if (null !== $series->getXPosition() && null !== $series->getYPosition()) {
                $xPosition = true === $series->isXPositionAPercentage() ?
                        $series->getXPosition() . '%' :
                        $series->getXPosition();
                $yPosition = true === $series->isYPositionAPercentage() ?
                        $series->getYPosition() . '%' :
                        $series->getYPosition();
                $options['center'] = array($xPosition, $yPosition);
            }

            if (null !== $series->getSize()) {
                $options['size'] = true === $series->isSizeAPercentage() ?
                        $series->getSize() . '%' :
                        $series->getSize();
            }

            if (null !== $series->getInnerSize()) {
                $options['innerSize'] = $series->getInnerSize();
            }

            if (null !== $series->getStartAngle()) {
                $options['startAngle'] = $series->getStartAngle();
            }

            if (null !== $series->getEndAngle()) {
                $options['endAngle'] = $series->getEndAngle();
            }

            $options['dataLabels']['distance'] = $series->getLabelsDistance();
        }

        $options['dataLabels']['style'] = $series->getLabelStyle();

        $hoverState = array(
            'enabled' => $series->getHoverState()->isEnabled(),
            'marker' => $this->renderMarker($series->getHoverState()->getMarker()),
        );

        if (null !== $series->getHoverState()->getLineWidth()) {
            $hoverState['lineWidth'] = $series->getHoverState()->getLineWidth();
        }
        if (
                true === $series->getHoverState() instanceof SolidHoverStateInterface &&
                null !== $series->getHoverState()->getBrightness()
        ) {
            $hoverState['brightness'] = $series->getHoverState()->getBrightness();
        }

        $options['states']['hover'] = $hoverState;

        return $options;
    }

    protected function renderMarker(MarkerInterface $marker)
    {
        if (false === $marker->isEnabled()) {
            return array('enabled' => false);
        }

        return array(
            'enabled' => $marker->isEnabled(),
            'fillColor' => $marker->getFillColor(),
            'lineColor' => $marker->getLineColor(),
            'lineWidth' => $marker->getLineWidth(),
            'radius' => $marker->getRadius(),
            'symbol' => $marker->getSymbol(),
        );
    }

    /**
     * Renders a data point.
     *
     * @param DataPointInterface $dataPoint Data point.
     *
     * @return array Options.
     */
    protected function renderDataPoint(DataPointInterface $dataPoint)
    {
        $options = array();
        if (null !== $dataPoint->getName()) {
            $options['name'] = $dataPoint->getName();
        }
        if (null !== $dataPoint->getColor()) {
            $options['color'] = $dataPoint->getColor();
        }
        if ($dataPoint instanceof PieDataPointInterface) {
            $options['sliced'] = $dataPoint->isSliced();
        }
        if (null !== $dataPoint->getXValue()) {
            $options['x'] = $dataPoint->getXValue();
        }

        $options['y'] = $dataPoint->getYValue();

        return $options;
    }

}
