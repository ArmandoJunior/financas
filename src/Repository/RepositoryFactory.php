<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: armandojrn
 * Date: 05/01/2018
 * Time: 15:25
 */

namespace Fin\Repository;


class RepositoryFactory
{
    public static function factory(string $modelClass)
    {
        return new DefaultRepository($modelClass);
    }

}