<?php
namespace App\Repository;

use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
   public function all(): Collection;
   public function search($request): Object;
}
