<?php
/**
 * Created by PhpStorm.
 * User: armandojrn
 * Date: 03/01/2018
 * Time: 14:23
 */

use Fin\Aplication;
use Fin\Models\CategoryCost;
use Fin\Plugins\DbPlugin;
use Fin\Plugins\RoutePlugin;
use Fin\Plugins\ViewPlugin;
use Fin\ServiceContainer;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\RedirectResponse;

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

$app
    ->get('/category-costs', function () use($app){
    $view = $app->service('view.renderer');
    $meuModel = new CategoryCost();
    $categories = $meuModel->all();
    return $view->render('category-costs/list.html.twig', [
        'categories' => $categories
        ]);
    },'category-costs.list')

    ->get('/category-costs/new', function () use($app){
        $view = $app->service('view.renderer');
        return $view->render('category-costs/create.html.twig');
    },'category-costs.new')

    ->post('/category-costs/store', function (ServerRequestInterface $request) use($app){
        //cadastro de category
        $data = $request->getParsedBody();
        CategoryCost::create($data);
        return $app->route('category-costs.list');
    },'category-costs.store')

    ->get('/category-costs/{id}/edit', function (ServerRequestInterface $request) use($app){
        $view = $app->service('view.renderer');
        $id = $request->getAttribute('id');
        $category = CategoryCost::findOrFail($id);
        return $view->render('category-costs/edit.html.twig', [
            'category' => $category
        ]);
    },'category-costs.edit')

    ->post('/category-costs/{id}/update', function (ServerRequestInterface $request) use($app){
        $id = $request->getAttribute('id');
        $category = CategoryCost::findOrFail($id);
        $data = $request->getParsedBody();
        $category->fill($data);
        $category->save();
        return $app->route('category-costs.list');
    },'category-costs.update')

    ->get('/category-costs/{id}/show', function (ServerRequestInterface $request) use($app){
        $view = $app->service('view.renderer');
        $id = $request->getAttribute('id');
        $category = CategoryCost::findOrFail($id);
        return $view->render('category-costs/show.html.twig', [
            'category' => $category
        ]);
    },'category-costs.show')

    ->get('/category-costs/{id}/delete', function (ServerRequestInterface $request) use($app){
        $id = $request->getAttribute('id');
        $category = CategoryCost::findOrFail($id);
        $category->delete();
        return $app->route('category-costs.list');
    },'category-costs.delete');;

$app->start();

