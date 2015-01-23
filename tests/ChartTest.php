<?php

class ChartTest extends PHPUnit_Framework_TestCase
{
    
    protected $chart;
    
    public function setUp()
    {
        parent::setUp();
        
        $this->chart = new \Aivo\Highchart\Chart();
    }
    
    public function testReturnsJson()
    {
        $this->chart->setOptions(array());
        $this->assertEquals($this->chart->getJSON(), json_encode(array()));
    }
    
}