<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
           [
               'id'    => 1,
               'name' => 'Admin',
               'color' => '#fa0000',
               'prefix' => 'A',
               'order' => '1',
               'guard_name' => 'web',
               'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
           ],
           [
               'id'    => 2,
               'name' => 'User',
               'color' => '#fa0000',
               'prefix' => 'A',
               'order' => '1',
               'guard_name' => 'web',
               'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
           ],
       ];

       Role::insert($roles);
    }
}
