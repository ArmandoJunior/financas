<?php
/**
 * Created by PhpStorm.
 * User: armandojrn
 * Date: 03/01/2018
 * Time: 14:23
 */

use Fin\Aplication;
use Fin\Plugins\RoutePlugin;
use Fin\ServiceContainer;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ServerRequestInterface;

require_once __DIR__ . '/../vendor/autoload.php';

$serviceContainer = new ServiceContainer();
$app = new Aplication($serviceContainer);

$app->plugin(new RoutePlugin());

$app->get('/', function (RequestInterface $request){
    var_dump($request->getUri());
    die();
    echo 'Hello World!!!';
});

$app->get('/home/{name}/{cpf}', function (ServerRequestInterface $request){
    $response = new Zend\Diactoros\Response();
    $response->getBody()->write("response com emitter do Diactoros");
    return $response;
});

$app->get('/armando', function (){
    echo 'Hello Armando!!!';
});

$app->start();

