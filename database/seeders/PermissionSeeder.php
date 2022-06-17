<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // articles
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'add articles']);
        Permission::create(['name' => 'delete articles']);

        // user
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'add user']);
        Permission::create(['name' => 'delete user']);

        // categories
        Permission::create(['name' => 'edit categories']);
        Permission::create(['name' => 'add categories']);
        Permission::create(['name' => 'delete categories']);


    }
}
