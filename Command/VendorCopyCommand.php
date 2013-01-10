<?php
namespace J\ChartsBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Output\Output;
use Symfony\Component\Finder\Finder;

class VendorCopyCommand extends ContainerAwareCommand {
	
	protected function configure()
	{
		$this
		->setName('charts:vendor:copy')
		->setDefinition(array(
				new InputArgument('vendorName', InputArgument::REQUIRED, 'Chart vendor name'),
				new InputArgument('targetDir', InputArgument::REQUIRED, 'Destination directory')
		))
		->setDescription('Copy chart vendor files into ChartBundle subdirectory')
		->setHelp(<<<EOT
The <info>%command.name%</info> copies chart vendor files into ChartBundle subdirectory
	
<info>php %command.full_name% flot/flot dir</info>
EOT
		)
		;
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$vendorName = rtrim($input->getArgument('vendorName'), '/');
		$originDir = realpath($this->getContainer()->get('kernel')->getRootDir().'/../vendor/'.$vendorName);
		$targetDir = rtrim($input->getArgument('targetDir'), '/');
		
		echo "Copy chart vendor: ".$originDir.' -> '.$targetDir.PHP_EOL;
		
		$filesystem = $this->getContainer()->get('filesystem');
		$filesystem->remove($targetDir);
		$filesystem->mkdir($targetDir, 0777);
		$filesystem->mirror($originDir, $targetDir, Finder::create()->in($originDir));
	}
}
