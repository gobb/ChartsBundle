<?php

namespace J\ChartsBundle\Api\pChart;

class Factory extends \J\ChartsBundle\Api\Factory
{
    public function create($type)
    {
        if ($type == 'bar') {
            $chart = new BarChart($this->data, $this->settings);
        } else {
            throw new \Exception("Unknown chart type '$type'");
        }

        return $chart;
    }

}
