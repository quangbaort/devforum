<?php

namespace App\Services;

interface UserServiceInterface

{
    public function pagination($limit);
    public function delete($id);
}
