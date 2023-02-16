<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use BaksDev\Reference\Clothing\Twig\SizeClothingExtension;
use Symfony\Config\TwigConfig;

return static function(ContainerConfigurator $configurator, TwigConfig $config) {
	$services = $configurator->services()
		->defaults()
		->autowire()      // Automatically injects dependencies in your services.
		->autoconfigure() // Automatically registers your services as commands, event subscribers, etc.
	;
	
	$services->set('color.input.twig.extension')
		->class(SizeClothingExtension::class)
		->tag('twig.extension')
	;
	
	$config->path(__DIR__.'/../view', 'SizeClothing');
	
};




