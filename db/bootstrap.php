<?php
/**
 * Created by PhpStorm.
 * User: armandojrn
 * Date: 07/01/2018
 * Time: 00:36
 */

use Fin\Aplication;
use Fin\Plugins\AuthPlugin;
use Fin\Plugins\DbPlugin;
use Fin\ServiceContainer;

$serviceContainer = new ServiceContainer();
$app = new Aplication($serviceContainer);

$app->plugin(new DbPlugin());
$app->plugin(new AuthPlugin());

return $app;

