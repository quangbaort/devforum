<?php

namespace App\Repository\Eloquent;

use App\Repository\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements EloquentRepositoryInterface
{
    /**
     * @var Model
     */
    public $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
    * @param array $attributes
    *
    * @return Model
    */
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    /**
    * @param $id
    * @return Model
    */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
    * @param $limit
    * @return Model
    */
    public function pagination($limit)
    {
        return $this->model->paginate($limit);
    }

     /**
    * @param $id
    * @return Model
    */
    public function delete($id)
    {
        $user = $this->model->find($id);
        return $this->model->delete($user);
    }
}
