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
            'create-event', 
            'edit-event', 
            'show-event',
            'delete-event',
            'create-event-schedule', 
            'edit-event-schedule', 
            'show-event-schedule',
            'delete-event-schedule',
            'edit-register',
            'show-register',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $superAdminRole = Role::where('name', 'super_admin')->firstOrFail();
        $superAdminRole->givePermissionTo($permissions);

        $adminRole = Role::where('name', 'admin')->firstOrFail();
        $adminRole->givePermissionTo([
            'admin-panel',
            'create-event', 
            'edit-event', 
            'show-event',
            'create-event-schedule', 
            'edit-event-schedule', 
            'show-event-schedule',
            'update-general-setting', 
            'cache-clear',
            'edit-register',
            'show-register',
        ]);

    }
}
