<?php
/**
 * Created by PhpStorm.
 * User: armandojrn
 * Date: 03/01/2018
 * Time: 14:23
 */

use Fin\Aplication;
use Fin\Plugins\DbPlugin;
use Fin\Plugins\RoutePlugin;
use Fin\Plugins\ViewPlugin;
use Fin\ServiceContainer;
use Psr\Http\Message\ServerRequestInterface;

require_once __DIR__ . '/../vendor/autoload.php';

$serviceContainer = new ServiceContainer();
$app = new Aplication($serviceContainer);

$app->plugin(new RoutePlugin());
$app->plugin(new ViewPlugin());
$app->plugin(new DbPlugin());

$app->get('/home/{name}/{cpf}', function (ServerRequestInterface $request){
    $response = new Zend\Diactoros\Response();
    $response->getBody()->write("response com emitter do Diactoros");
    return $response;
});

require_once __DIR__ . '/../src/controllers/category-costs.php';

$app->start();

