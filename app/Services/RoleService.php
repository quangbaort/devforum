<?php
namespace App\Services;

use App\Services\ServiceInterface\RoleServiceInterface;

class RoleService extends BaseService implements RoleServiceInterface
{
    public $roleServiceRepository;

    /**
     * userRepository constructor.
     *
     * @param RoleServiceInterface $roleServiceRepository
     */
    public function __construct(RoleServiceInterface $roleServiceRepository)
    {
        parent::__construct($roleServiceRepository);
        $this->roleServiceRepository = $roleServiceRepository;
    }
}
