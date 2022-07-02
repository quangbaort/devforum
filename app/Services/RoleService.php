<?php
namespace App\Services;

use App\Repository\PermissionRepositoryInterface;
use Illuminate\Support\Collection;
use App\Services\ServiceInterface\RoleServiceInterface;

class RoleService extends BaseService implements RoleServiceInterface
{
    public $roleServiceRepository;

    /**
    * userRepository constructor.
    *
    * @param PermissionServiceInterface $permissionRepository
    */
    public function __construct(RoleServiceInterface $roleServiceRepository)
    {
        parent::__construct($roleServiceRepository);
        $this->roleServiceRepository = $roleServiceRepository;
    }
}
