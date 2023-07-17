<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PermissionModule;
use Carbon\Carbon;

class PermssionModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = [
            [
                'id'    => 1,
                'name' => 'Administracja',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'    => 2,
                'name' => 'Zarządzanie Rolami',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'    => 3,
                'name' => 'Zarządzanie Użytkownikami',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];
        PermissionModule::insert($modules);
    }
}
