<?php
declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: armandojrn
 * Date: 03/01/2018
 * Time: 00:01
 */

namespace Fin;


interface ServiceContainerInterface
{
    public function add(string $name, $service);

    public function addLazy(string $name, callable $callable);

    public function get(string $name);

    public function has(string $name);

}