<?php

namespace Aivo\Highchart;

class Chart extends AbstractChart
{

    /**
     * Factory method.
     *
     * @return ChartInterface New chart.
     */
    public static function factory()
    {
        return new self();
    }

}
