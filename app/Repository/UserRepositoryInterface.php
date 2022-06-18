<?php
namespace App\Repository;

use App\Model\User;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
   public function fetchAll(): Collection;
   public function search($request): Object;
}
