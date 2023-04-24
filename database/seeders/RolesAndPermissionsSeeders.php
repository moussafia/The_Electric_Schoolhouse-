<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          // Create the permissions
          Permission::create(['name' => 'updateUsers']);
          Permission::create(['name' => 'deleteUsers']);
          Permission::create(['name' => 'deleteAdmins']);
          Permission::create(['name' => 'CUDBlogs']);
          Permission::create(['name' => 'CUDQuizz']);
  
          // Create the roles
          $superAdminRole = Role::create(['name' => 'SuperAdmin']);
          $adminRole = Role::create(['name' => 'Admin']);
          $usersRole = Role::create(['name' => 'User']);

          $superAdminRole->syncPermissions(['updateUsers','deleteUsers','deleteAdmins']);
          $adminRole->syncPermissions(['updateUsers','deleteUsers']);
          $usersRole->syncPermissions(['CUDBlogs','CUDQuizz']);

    }
}
