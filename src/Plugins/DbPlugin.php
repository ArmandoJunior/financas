<?php
/**
 * Created by PhpStorm.
 * User: armandojrn
 * Date: 03/01/2018
 * Time: 13:08
 */
declare(strict_types = 1);

namespace Fin\Plugins;


use Fin\Models\CategoryCost;
use Fin\Repository\RepositoryFactory;
use Fin\ServiceContainerInterface;
use Illuminate\Database\Capsule\Manager as Capsule;
use Psr\Container\ContainerInterface;

class DbPlugin implements PluginsInterface
{

    public function register(ServiceContainerInterface $container)
    {
        $capsule = new Capsule();
        $config = include __DIR__ . '/../../config/db.php';
        $capsule->addConnection($config['development']);
        $capsule->bootEloquent();

        $container->add('repository.factory', new RepositoryFactory());
        $container->addLazy('category-cost.repository', function (ContainerInterface $container){
            return $container->get('repository.factory')->factory(CategoryCost::class);
        });
    }

}