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
    public function find($id): Model
    {
        return $this->model->find($id);
    }


    /**
    * @param $id
    * @return bool|null
     */
    public function delete($id): ?bool
    {
        $user = $this->model->find($id);
        return $this->model->delete($user);
    }

    /**
    *
    * @return Model
    */
    public function all(): Collection
    {
        return $this->model->all();
    }

}
