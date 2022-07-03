<?php
namespace App\Services;

use App\Models\User;
use App\Repository\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Services\ServiceInterface\UserServiceInterface;
use Illuminate\Support\Facades\Session;


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
    * @param Request $request
    * @return Collection
    */
    public function search($request): Object
    {
        Session::flashInput($request->input());
        return $this->userRepository->search($request);
    }

    public function assignRoles(array $roles, User $user): User
    {
        return $user->assignRole($roles);
    }
}
