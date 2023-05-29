<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
    //     //  // Xóa hết các permissions hiện có trong bảng
    //     //  Permission::truncate();

    //     //  // Tạo các permissions mới
    //     //  Permission::create(['name' => 'create-post', 'slug' => 'create-post']);
    //     //  Permission::create(['name' => 'edit-post', 'slug' => 'edit-post']);
    //     //  Permission::create(['name' => 'delete-post', 'slug' => 'delete-post']);
    //     $permissions = [
    //         'role-list',
    //         'role-create',
    //         'role-edit',
    //         'role-delete',
    //         'product-list',
    //         'product-create',
    //         'product-edit',
    //         'product-delete',
    //         'baiviet-list',
    //         'baiviet-create',
    //         'baiviet-edit',
    //         'baiviet-delete',
    //      ];
       
    //      foreach ($permissions as $permission) {
    //           Permission::create(['name' => $permission]);
    //      }
    // }
    public function run()
    {
        // Xóa hết các permissions hiện có trong bảng
        Permission::truncate();

        // Tạo các permissions mới
        Permission::create(['name' => 'create-post', 'slug' => 'create-post']);
        Permission::create(['name' => 'edit-post', 'slug' => 'edit-post']);
        Permission::create(['name' => 'delete-post', 'slug' => 'delete-post']);
    }
}
