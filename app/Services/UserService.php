<?php
namespace App\Services;

use App\Repository\UserRepositoryInterface;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use App\Services\ServiceInterface\UserServiceInterface;


class UserService extends BaseService implements UserServiceInterface
{
    public $userRepository;

    /**
    * userRepository constructor.
    *
    * @param UserRepositoryInterface $userRepository
    */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        parent::__construct($userRepository);
       $this->userRepository = $userRepository;
    }

    /**
    *
    *
    * @param Request $request
    * @return Collection
    */
    public function search($request): Object
    {
        session()->flashInput($request->input());
        return $this->userRepository->search($request);
    }

}
