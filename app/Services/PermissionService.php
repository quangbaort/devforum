<?php
namespace App\Services;

use App\Repository\PermissionRepositoryInterface;
use App\Services\ServiceInterface\PermissionServiceInterface;

class PermissionService extends BaseService implements PermissionServiceInterface
{
    public $permissionRepository;

    /**
     * userRepository constructor.
     *
     * @param PermissionRepositoryInterface $permissionRepository
     */
    public function __construct(PermissionRepositoryInterface $permissionRepository)
    {
        parent::__construct($permissionRepository);
        $this->permissionRepository = $permissionRepository;
    }
}
