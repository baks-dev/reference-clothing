<?php
/*
 * This file is part of the FreshCentrifugoBundle.
 *
 * (c) Artem Henvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace BaksDev\Reference\Clothing;

use BaksDev\Reference\Clothing\Choice\ReferenceChoiceSizeClothing;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class BaksDevReferenceClothingBundle extends AbstractBundle
{
    public const NAMESPACE = __NAMESPACE__.'\\';

    public const PATH = __DIR__.DIRECTORY_SEPARATOR;

//    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
    //    {
    //        $services = $container->services()
    //            ->defaults()
    //            ->autowire()
    //            ->autoconfigure();
    //
    //        $services->load(self::NAMESPACE, self::PATH)
    //            ->exclude([
    //                self::PATH.'{Entity,Resources,Type}',
    //                self::PATH.'**/*Message.php',
    //                self::PATH.'**/*DTO.php',
    //            ]);
    //
    //        $services->load(
    //            self::NAMESPACE.'Form\\',
    //            self::PATH.'Form'
    //        );
    //
    //        $services->load(
    //            self::NAMESPACE.'Type\Sizes\\',
    //            self::PATH.'Type/Sizes'
    //        );
    //
    //        $services->load(
    //            self::NAMESPACE.'Listeners\\',
    //            self::PATH.'Listeners'
    //        );
    //
    //        $services->load(
    //            self::NAMESPACE.'Twig\\',
    //            self::PATH.'Twig'
    //        );
    //
    //        $services->set(ReferenceChoiceSizeClothing::class)
    //            ->tag('baks.reference.choice')
    //            ->tag('baks.fields.choice');
    //
    //    }

}
