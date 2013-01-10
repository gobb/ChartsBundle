<?php
namespace J\ChartsBundle\Composer;
use Sensio\Bundle\DistributionBundle\Composer\ScriptHandler;

class LibrariesHandler extends ScriptHandler {
	
	public static function install($event)
	{
		$options = self::getOptions($event);
		$appDir = $options['symfony-app-dir'];
		
		$vendorToDir = array ("flot/flot" => "Resources/public/flot");
		
		foreach ($vendorToDir as $vendorName => $subDir) {
			$destDir = realpath(__DIR__.'/../')."/".$subDir;
			static::executeCommand($event, $appDir, 'charts:vendor:copy '.$vendorName.' '.escapeshellarg($destDir));
		}		
	}
}
