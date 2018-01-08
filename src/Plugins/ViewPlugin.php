<?php
/**
 * Created by PhpStorm.
 * User: armandojrn
 * Date: 03/01/2018
 * Time: 13:08
 */
declare(strict_types = 1);

namespace Fin\Plugins;


use Fin\ServiceContainerInterface;
use Fin\view\Twig\TwigGlobals;
use Fin\view\ViewRenderer;
use Interop\Container\ContainerInterface;


class ViewPlugin implements PluginsInterface
{

    public function register(ServiceContainerInterface $container)
    {
        $container->addLazy('twig', function (ContainerInterface $container){
           $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../../templates');
           $twig = new \Twig_Environment($loader);

           $auth = $container->get('auth');

           $generator = $container->get('routing.generator');
           $twig->addExtension(new TwigGlobals($auth));
           $twig->addFunction(new \Twig_SimpleFunction('route',
               function (string $name, $params =[]) use($generator){
                    return $generator->generate($name,$params);
           }));
           return $twig;
        });

        $container->addLazy('view.renderer', function (ContainerInterface $container){
            $twigEnviroment = $container->get('twig');
            return new ViewRenderer($twigEnviroment);

        });

    }

}