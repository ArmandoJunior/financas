<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: armandojrn
 * Date: 05/01/2018
 * Time: 14:31
 */

namespace Fin\Repository;


class DefaultRepository implements RepositoryInterface
{
    /**
     * @var string
     */
    private $modelClass;
    /*
     * @var Model
     * */
    private $model;

    /**
     * DefaultRepository constructor.
     */
    public function __construct(string $modelClass)
    {
        $this->modelClass = $modelClass;
        $this->model = new $modelClass;
    }

    public function all(): array
    {
        return $this->model->all()->toArray();
    }

    public function create(array $data)
    {
        $this->model->fill($data);
        $this->model->save();
        return $this->model;
    }

    public function update(int $id, array $data)
    {
        $model = $this->model->find($id);
        $model->fill($data);
        $model->save();
        return $model;
    }

    public function delete(int $id)
    {
        $model = $this->model->find($id);
        $model->delete();
    }

    public function find(int $id)
    {
        return $this->model->findOrFail($id);
    }
}