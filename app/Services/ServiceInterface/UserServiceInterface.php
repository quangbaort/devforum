<?php

namespace App\Services\ServiceInterface;

use Illuminate\Database\Eloquent\Model;

interface UserServiceInterface

{
    public function search($request): Object;
    public function delete($id);
}
