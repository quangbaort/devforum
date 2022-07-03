<?php

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Repository\UserRepositoryInterface;
use Illuminate\Support\Collection;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
   /**
    * UserRepository constructor.
    *
    * @param User $model
    */
    public function __construct(User $model)
    {
       parent::__construct($model);
    }

    /**
     *
     * @param Request $request
     *
     * @return Collection
    */
    public function search($request) :Object
    {
        // search by name
        if($request->has('name') && $request->name != '') {
            $this->model = $this->model->where('name', 'like', '%'.$request->name.'%');
        }
        // search by  email
        if($request->has('email') && $request->email != '') {
            $this->model = $this->model->where('email', 'like', '%'.$request->email.'%');
        }
        // search permissions
        if($request->has('roles') && $request->roles != '') {
            $this->model = $this->model->whereHas('roles', function($query) use ($request) {
                $query->where('name', 'like', '%'.$request->roles.'%');
            });
        }

        return $this->model
            ->paginate($request->limit ?? config('const.paginate_default'))
            ->withQueryString();
    }

}
