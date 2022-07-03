<?php

namespace App\Services;

use App\Repository\EloquentRepositoryInterface;
use App\Services\ServiceInterface\ServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseService implements ServiceInterface
{
    /**
     * @var EloquentRepositoryInterface
     */
    public $repository;

    /**
     * BaseService constructor.
     *
     * @param EloquentRepositoryInterface $repository
     */
    public function __construct(EloquentRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $attributes
     *
     * @return Model
     */
    public function create(array $attributes): Model
    {
        return $this->repository->create($attributes);
    }

    /**
     * @param $id
     * @return Model
     */
    public function find($id): Model
    {
        return $this->repository->find($id);
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id): bool
    {
        $user = $this->find($id);
        return $user->delete($user);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->repository->all();
    }
}



