<?php
namespace App\Repository;


use Illuminate\Support\Collection;

interface PermissionRepositoryInterface
{
    public function all(): Collection;
}
