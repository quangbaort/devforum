<?php

namespace App\Services\ServiceInterface;
use Illuminate\Database\Eloquent\Model;
interface ServiceInterface
{
    public function all();
    public function create(array $attributes): Model;
}
