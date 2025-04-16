<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'create-role', 
            'edit-role', 
            'delete-role', 
            'set-userRole', 
            'create-user', 
            'show-user',
            'delete-user',
            'update-general-setting', 
            'update-email-setting', 
            'cache-clear',
            'admin-panel',
            'create-project', 
            'edit-project', 
            'show-project',
            'delete-project',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $superAdminRole = Role::where('name', 'super_admin')->firstOrFail();
        $superAdminRole->givePermissionTo($permissions);

        $adminRole = Role::where('name', 'admin')->firstOrFail();
        $adminRole->givePermissionTo([
            'admin-panel',
            'create-project', 
            'edit-project', 
            'show-project',
            'update-general-setting', 
            'cache-clear',
        ]);

    }
}
