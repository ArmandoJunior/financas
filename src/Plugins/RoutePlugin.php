<?php
/**
 * Created by PhpStorm.
 * User: armandojrn
 * Date: 03/01/2018
 * Time: 13:08
 */
declare(strict_types = 1);

namespace Fin\Plugins;


use Aura\Router\RouterContainer;
use Fin\ServiceContainerInterface;

use Interop\Container\ContainerInterface;
use Psr\Http\Message\RequestInterface;
use Zend\Diactoros\ServerRequestFactory;


class RoutePlugin implements PluginsInterface
{

    public function register(ServiceContainerInterface $container)
    {
        $routerContainer = new RouterContainer();

        /* Registrar as rotas da aplicação */
        $map = $routerContainer->getMap();
        /* Tem a função de Identificar qual a rota que está sendo acessada */
        $matcher = $routerContainer->getMatcher();
        /* Tem função de gerar links com base nas rotas registradas */
        $generator = $routerContainer->getGenerator();

        $request = $this->getRequest();

        $container->add('routing', $map);
        $container->add('routing.matcher', $matcher);
        $container->add('routing.generator', $generator);
        $container->add(RequestInterface::class, $request);
        $container->addLazy('route', function(ContainerInterface $container){
           $matcher = $container->get('routing.matcher');
           $request = $container->get(RequestInterface::class);
           return $matcher->match($request);
        });

    }

    protected function getRequest():RequestInterface
    {
        return ServerRequestFactory::fromGlobals(
            $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
        );
    }
}