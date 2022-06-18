<?php
namespace App\Repository;


use Illuminate\Support\Collection;

interface PermissionRepositoryInterface
{
    public function fetchAll(): Collection;
}
