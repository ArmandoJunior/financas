<?php
/**
 * Created by PhpStorm.
 * User: armandojrn
 * Date: 03/01/2018
 * Time: 12:41
 */

namespace Fin\Plugins;


use Fin\ServiceContainerInterface;

interface PluginsInterface
{
    public function register(ServiceContainerInterface $serviceContainer);
}