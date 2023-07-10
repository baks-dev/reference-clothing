<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return static function(ContainerConfigurator $configurator)
    {

        $services = $configurator->services()
            ->defaults()
            ->autowire(true)
            ->autoconfigure(true);

        $namespace = 'BaksDev\Reference\Clothing';

        $services->load($namespace.'\Form\\', __DIR__.'/../../Form');

        $services->load($namespace.'\Type\Sizes\Collection\\', __DIR__.'/../../Type/Sizes/Collection');

        $services->load($namespace.'\Listeners\\', __DIR__.'/../../Listeners');

    };

