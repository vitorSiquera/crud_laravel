<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $permissions = [
            'users.view',
            'users.creat',
            'users.edit',
            'users.delete',
            'groups.view',
            'groups.create',
            'groups.edit',
            'groups.delete',
        ];
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        $super = Role::firstOrCreate(['name' => 'SUPER-ADMIN', 'guard_name' => 'web']);
        $admin = Role::firstOrCreate(['name' => 'ADMIN', 'guard_name' => 'web']);
        $viewer = Role::firstOrCreate(['name' => 'VIEWER', 'guard_name' => 'web']);

        $super->syncPermissions(Permission::all());

        $admin->syncPermissions(($permissions));

        $viewer->syncPermissions([
            'users.view',
            'groups.view',
        ]);

    }
}
