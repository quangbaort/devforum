<?php
namespace App\Services;

use App\Repository\PermissionRepositoryInterface;
use Illuminate\Support\Collection;
use App\Services\ServiceInterface\PermissionServiceInterface;

class PermissionService extends BaseService implements PermissionServiceInterface
{
    public $permissionRepository;

    /**
    * userRepository constructor.
    *
    * @param PermissionServiceInterface $permissionRepository
    */
    public function __construct(PermissionRepositoryInterface $permissionRepository)
    {
        parent::__construct($permissionRepository);
        $this->permissionRepository = $permissionRepository;
    }
}
