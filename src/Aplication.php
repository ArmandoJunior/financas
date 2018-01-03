<?php
/**
 * Created by PhpStorm.
 * User: armandojrn
 * Date: 03/01/2018
 * Time: 11:26
 */
declare(strict_types = 1);
namespace Fin;


use Fin\Plugins\PluginsInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\SapiEmitter;

class Aplication
{
    private $serviceContainer;

    /**
     * Aplication constructor.
     * @param $serviceContainer
     */
    public function __construct(ServiceContainerInterface $serviceContainer)
    {
        $this->serviceContainer = $serviceContainer;
    }

    public function service($nome)
    {
        return $this->serviceContainer->get($nome);
    }

    public function addService(string $name, $service):void
    {
        if (is_callable($service)) {
            $this->serviceContainer->addLazy($name, $service);
        }else {
            $this->serviceContainer->add($name, $service);
        }
    }

    public function plugin(PluginsInterface $plugin):void
    {
        $plugin->register($this->serviceContainer);
    }

    public function get($path, $action, $name = null):Aplication
    {
        $routing = $this->service('routing');
        $routing->get($name, $path, $action);
        return $this;

    }

    public function start()
    {
        $route = $this->service('route');
        /** @var ServerRequestInterface $request */
        $request = $this->service(RequestInterface::class);

        if(!$route) {
            echo 'Page not found. get out...';
            exit;
        }

        foreach ($route->attributes as $key => $value) {
            $request = $request->withAttribute($key, $value);
        }

        $callable = $route->handler;
        $response = $callable($request);
        $this->emitResponse($response);
    }

    protected function emitResponse(ResponseInterface $response)
    {
        $emitter = new SapiEmitter();
        $emitter->emit($response);
    }

}