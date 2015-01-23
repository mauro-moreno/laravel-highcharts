<?php

namespace Aivo\Highchart;

class Chart extends AbstractChart
{
    
    public function getJson()
    {
        return json_encode($this->options);
    }

}