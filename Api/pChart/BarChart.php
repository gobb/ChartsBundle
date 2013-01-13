<?php
namespace J\ChartsBundle\Api\pChart;

require_once(__DIR__ . '/../../../../../../../vendor/pchart/pchart/class/pData.class.php');
require_once(__DIR__ . '/../../../../../../../vendor/pchart/pchart/class/pDraw.class.php');
require_once(__DIR__ . '/../../../../../../../vendor/pchart/pchart/class/pImage.class.php');


class BarChart extends \J\ChartsBundle\Api\BarChart
{
    protected $data;
    protected $settings;

    public function __construct(&$data, $settings)
    {
        $this->data = $data;
        $this->settings = $settings;
    }

    public function draw() {
        $MyData = new \pData();
        $MyData->addPoints($this->data);

        //var_dump($this->settings);         var_dump($this->settings['width'],$this->settings['height']); die();
        if(!$this->settings['width'] || !$this->settings['height']) {
            throw new \Exception("width and height must be set");
        }
        $myPicture = new \pImage($this->settings['width'],$this->settings['height'],$MyData);

        $myPicture->setFontProperties(array("FontName"=>__DIR__ . '/../../../../../../../vendor/pchart/pchart/fonts/pf_arma_five.ttf',"FontSize"=>6));

        $myPicture->drawRectangle(0,0,$this->settings['width']-1,$this->settings['height']-1,array("R"=>0,"G"=>0,"B"=>0));
        $myPicture->setGraphArea(10,10,$this->settings['width']-10,$this->settings['height']-10);

        $scaleSettings = array("GridR"=>200,"GridG"=>200,"GridB"=>200,"DrawSubTicks"=>TRUE,"CycleBackground"=>TRUE);
        $myPicture->drawScale($scaleSettings);

        $myPicture->drawLegend(580,12,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));
        $myPicture->drawBarChart();
        $myPicture->stroke();

    }

}
