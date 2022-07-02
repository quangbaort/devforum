<?php
namespace App\Repository;
use Illuminate\Support\Collection;

interface RoleRepositoryInterface
{
    public function all(): Collection;
}
