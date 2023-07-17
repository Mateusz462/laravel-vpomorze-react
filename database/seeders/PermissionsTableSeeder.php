<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Carbon\Carbon;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'name' => 'permission_access',
                'description' => 'Dostęp do',
                'module_id' => 1,
                'guard_name' => 'web',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'    => 2,
                'name' => 'permission_create',
                'description' => 'Dostęp do',
                'module_id' => 1,
                'guard_name' => 'web',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'    => 3,
                'name' => 'permission_edit',
                'description' => 'Dostęp do',
                'module_id' => 1,
                'guard_name' => 'web',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'    => 4,
                'name' => 'permission_delete',
                'module_id' => 1,
                'description' => 'Dostęp do',
                'guard_name' => 'web',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'    => 5,
                'name' => 'role_access',
                'description' => 'Dostęp do',
                'module_id' => 2,
                'guard_name' => 'web',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'    => 6,
                'name' => 'role_create',
                'description' => 'Dostęp do',
                'module_id' => 2,
                'guard_name' => 'web',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'    => 7,
                'name' => 'role_edit',
                'description' => 'Dostęp do',
                'module_id' => 2,
                'guard_name' => 'web',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'    => 8,
                'name' => 'role_delete',
                'description' => 'Dostęp do',
                'module_id' => 2,
                'guard_name' => 'web',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'    => 9,
                'name' => 'user_list_access',
                'description' => 'Dostęp do',
                'module_id' => 3,
                'guard_name' => 'web',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'    => 10,
                'name' => 'user_card_access',
                'description' => 'Dostęp do',
                'module_id' => 3,
                'guard_name' => 'web',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'    => 11,
                'name' => 'user_edit',
                'description' => 'Dostęp do',
                'module_id' => 3,
                'guard_name' => 'web',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'    => 12,
                'name' => 'user_show',
                'description' => 'Dostęp do',
                'module_id' => 3,
                'guard_name' => 'web',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'    => 13,
                'name' => 'user_delete',
                'description' => 'Dostęp do',
                'module_id' => 3,
                'guard_name' => 'web',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'    => 14,
                'name' => 'clear-user-session',
                'module_id' => 3,
                'description' => 'Dostęp do',
                'guard_name' => 'web',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'    => 15,
                'name' => 'activate-user',
                'description' => 'Dostęp do',
                'module_id' => 3,
                'guard_name' => 'web',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'    => 16,
                'name' => 'deactivate-user',
                'description' => 'Dostęp do',
                'module_id' => 3,
                'guard_name' => 'web',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'    => 17,
                'name' => 'login-as-user',
                'description' => 'Dostęp do',
                'module_id' => 3,
                'guard_name' => 'web',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ];

        Permission::insert($permissions);
    }
}
