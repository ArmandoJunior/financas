<?php
/**
 * Created by PhpStorm.
 * User: armandojrn
 * Date: 03/01/2018
 * Time: 13:08
 */
declare(strict_types = 1);

namespace Fin\Plugins;


use Fin\Auth\Auth;
use Fin\Auth\JasnyAuth;
use Fin\ServiceContainerInterface;
use Interop\Container\ContainerInterface;

class AuthPlugin implements PluginsInterface
{

    public function register(ServiceContainerInterface $container)
    {
        $container->addLazy('jasny.auth', function (ContainerInterface $container){
            return new JasnyAuth($container->get('user.repository'));
        });
        $container->addLazy('auth', function (ContainerInterface $container){
           return new Auth($container->get('jasny.auth'));
        });
    }

}