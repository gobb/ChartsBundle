<?php

namespace J\ChartsBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\Definition;

class JChartsBundle extends Bundle
{
    public function boot()
    {
    	$this->container->get('twig')->addExtension(new \J\ChartsBundle\Twig\ChartsExtension());
    }
}
