<?php

namespace J\ChartsBundle\Api;

use J\ChartsBundle\Api\pChart\BarChart;

class Factory
{

    protected  $data;
    protected $settings;

    /**
     * Can be called multiple times to add more data sets.
     *
     * @param $data
     * @return Factory
     */
    public function addData(&$data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * Set settings for creating a chart.
     *
     * @param $settings
     * @return Factory
     */
    public function setSettings($settings)
    {
        $this->settings = $settings;
        return $this;
    }


    public function create($type)
    {
        return NULL;
    }

    /**
     * Returns an array of all available types of charts for configured library.
     */
    public function getTypes()
    {
        return array('bar');
    }

}

