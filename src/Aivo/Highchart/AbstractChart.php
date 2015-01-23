<?php

namespace Aivo\Highchart;

class AbstractChart
{
    
    protected $options = array();

    public function setOptions($options)
    {
        $this->options = $options;
    }

}