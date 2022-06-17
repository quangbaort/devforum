<?php
namespace App\Services;

use App\Repository\UserRepositoryInterface;
use Illuminate\Support\Collection;

class UserService
{
    public $userRepository;

    /**
    * userRepository constructor.
    *
    * @param UserRepositoryInterface $userRepository
    */
    public function __construct(UserRepositoryInterface $userRepository)
    {
       $this->userRepository = $userRepository;
    }

    /**
    * userRepository fetchAll.
    *
    * @return Collection
    */
    public function fetchAll(): Collection
    {
        return $this->userRepository->all();
    }

    /**
    * userRepository paginate.
    *
    * @return Collection
    */
    public function userPaginate($request)
    {
        if(isset($request->limit) && (int) $request->limit > 0 )
            return $this->userRepository->userPaginate($request->limit);
        return $this->userRepository->userPaginate(config('const.paginate_default'));
    }
}
