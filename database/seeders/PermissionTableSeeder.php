<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permissions
        $permissions = [
            'admin-dashboard',
            'admin-transaction',
            'admin-course',
            'admin-pointmarket',
            'server-side',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'crud-list',
            'crud-create',
            'crud-edit',
            'crud-delete',
            'classtype-list',
            'classtype-create',
            'classtype-edit',
            'classtype-delete',
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',
            'pointmarket-list',
            'pointmarket-create',
            'pointmarket-edit',
            'pointmarket-delete',
            'course-list',
            'course-create',
            'course-edit',
            'course-delete',
            'meeting-list',
            'meeting-create',
            'meeting-edit',
            'meeting-delete',
        ];
       
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}