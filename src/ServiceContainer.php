<?php
/**
 * Created by PhpStorm.
 * User: armandojrn
 * Date: 03/01/2018
 * Time: 00:22
 */

namespace Fin;


use Xtreamwayz\Pimple\Container;

class ServiceContainer implements ServiceContainerInterface
{
    private $container;

    public function __construct()
    {
        $this->container = new Container();
    }

    public function add(string $name, $service)
    {
        $this->container[$name] = $service;
    }

    public function addLazy(string $name, callable $callable)
    {
        $this->container[$name] = $this->container->factory($callable);
    }

    public function get(string $name)
    {
        return $this->container->get($name);
    }

    public function has(string $name)
    {
        return $this->container->has($name);
    }
}