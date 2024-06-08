<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use BaksDev\Reference\Clothing\Type\SizeClothing;
use BaksDev\Reference\Clothing\Type\SizeClothingType;
use Symfony\Config\DoctrineConfig;

return static function(DoctrineConfig $doctrine) {
	$doctrine->dbal()->type(SizeClothing::TYPE)->class(SizeClothingType::class);
};