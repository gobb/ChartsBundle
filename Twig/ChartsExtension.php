<?php
namespace J\ChartsBundle\Twig;

use J\ChartsBundle\ChartsEngine\Flot;

use Symfony\Component\DependencyInjection\ContainerAware;

final class ChartsExtension extends \Twig_Extension {

	private $container;
	
	function __construct(\AppKernel $kernel) {
		$this->container = $kernel->getContainer();
	}
	
	public function getFunctions()
	{
		return array(
				'chart' => new \Twig_Function_Method($this, 'chart')
		);
	}

	public function chart($dataArrays, $type)
	{
		$engine = $this->container->get("charts.engine.".$type);

		$engine->setData($dataArrays);
		
		return $engine->getHtml();
	}

	public function getName()
	{
		return 'charts_extension';
	}
}
