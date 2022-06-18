<?php
namespace App\Services;

use App\Repository\UserRepositoryInterface;
use Illuminate\Support\Collection;

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

}
