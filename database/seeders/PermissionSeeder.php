<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         // User management
         $moduleAppUser = Module::updateOrCreate(['title' => 'User', 'slug'=>Str::slug('user')]);
         Permission::updateOrCreate([
             'module_id' => $moduleAppUser->id,
             'title' => 'Access User',
             'slug' => 'app.users.index',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleAppUser->id,
             'title' => 'Create User',
             'slug' => 'app.users.create',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleAppUser->id,
             'title' => 'Edit User',
             'slug' => 'app.users.edit',
         ]);
         Permission::updateOrCreate([
             'module_id' => $moduleAppUser->id,
             'title' => 'Delete User',
             'slug' => 'app.users.destroy',
         ]);

        // HomePage management
        $moduleAppHomePage = Module::updateOrCreate(['title' => 'Home Page', 'slug'=>Str::slug('homepage')]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppHomePage->id,
            'title' => 'Access Home Page',
            'slug' => 'app.homepage.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppHomePage->id,
            'title' => 'Create Home Page',
            'slug' => 'app.homepage.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppHomePage->id,
            'title' => 'Edit Home Page',
            'slug' => 'app.homepage.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppHomePage->id,
            'title' => 'Delete Home Page',
            'slug' => 'app.homepage.destroy',
        ]);


        // User Permission
        $moduleAppUserPermission = Module::updateOrCreate(['title' => 'User Permission', 'slug'=>Str::slug('user_permission')]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppUserPermission->id,
            'title' => 'View User Permissions',
            'slug' => 'app.user_permission.index',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleAppUserPermission->id,
            'title' => 'Update User Permissions',
            'slug' => 'app.user_permission.update',
        ]);

    }
}
