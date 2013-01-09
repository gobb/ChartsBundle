<?php
namespace J\ChartsBundle\Twig;

class ChartsExtension extends \Twig_Extension {

	public function getFunctions()
	{
		return array(
				'chart' => new \Twig_Function_Method($this, 'chart')
		);
	}

	public function chart($dataArrays)
	{
		return "Here will be Chart";
	}

	public function getName()
	{
		return 'charts_extension';
	}
}
