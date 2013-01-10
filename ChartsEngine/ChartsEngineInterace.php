<?php
namespace J\ChartsBundle\ChartsEngine;
interface ChartsEngineInterace {
	function setData(array $data);
	function getHtml();
}
