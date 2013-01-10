<?php
namespace J\ChartsBundle\ChartsEngine;

class Flot implements ChartsEngineInterace {
	
	function setData(array $data) {
		$this->data = $data;
	}
	
	function getHtml() {
		return "Here will be Flot chart";
	}
}
