<?php
namespace App\Services;

use App\Services\ServiceInterface;
use App\Repository\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

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
    public function find($id)
    {
        return $this->repository->find($id);
    }
    /**
     * @param $limit
     * @return Model
     */
    public function pagination($request): Object
    {
        $limit = $request->limit ?? config('const.paginate_default');
        return $this->repository->pagination($limit);
    }
    /**
     * @param $id
     * @return Model
     */
    public function delete($id)
    {
        $user = $this->find($id);
        return $user->delete($user);
    }
}



