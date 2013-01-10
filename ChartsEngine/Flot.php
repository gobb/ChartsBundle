<?php
namespace J\ChartsBundle\ChartsEngine;

class Flot implements ChartsEngineInterace {
	
	protected $data;
	
	public function setData(array $data) {
		$this->data = $data;
	}
	
	public function getHtml() {
		$placeholder = '<div id="placeholder" style="width:600px;height:300px;"></div>';
		
		$script = '<script type="text/javascript">$(function () {';
		
		$dataSeriesTxt = '';
		foreach ($this->data as $dataSeriesKey => $data) {
			$dataSeriesTxt .= 'd'.$dataSeriesKey.',';
			$script .= 'var d'.$dataSeriesKey.' = '.$this->translateSerie($data).';';
		}

		$dataSeriesTxt = rtrim($dataSeriesTxt, ",");
		
		$script .= '$.plot($("#placeholder"), [ '.$dataSeriesTxt.' ]);});</script>';
		
		return $placeholder.$script;
	}
	
	protected function translateSerie($data) {
		$retVal = array();
		foreach ($data as $k=>$v) {
			$retVal[] = array($k, $v);
		}
		return json_encode($retVal);
	}

}
