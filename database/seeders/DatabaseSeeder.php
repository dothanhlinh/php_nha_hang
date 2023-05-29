<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Tạo các vai trò
        $adminRole = Role::create(['name' => 'admin']);
        $editorRole = Role::create(['name' => 'editor']);

        // Tạo các quyền
        Permission::create(['name' => 'manage-users']);
        Permission::create(['name' => 'manage-posts']);

        // Gán quyền cho vai trò
        $adminRole->givePermissionTo('manage-users');
        $editorRole->givePermissionTo('manage-posts');
    }
}
                                                