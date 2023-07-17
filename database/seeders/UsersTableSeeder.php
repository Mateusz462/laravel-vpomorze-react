<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id' => 1,
                'imie' => 'Marian',
                'nazwisko' => 'Masło',
                'email' => 'admin@admin.com',
                'login' => 'masło123',
                'code' => rand(0, 100),
                'avatar_type' => 'storage',
                'status' => '1',
                'deleted' => '0',
                'password' => bcrypt('123456789'),
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'             => 2,
                'imie' => 'Piotr',
                'nazwisko' => 'Warzywko',
                'email' => 'warzywo@gmail.com',
                'login' => 'Warzywko',
                'code' => rand(0, 100),
                'avatar_type' => 'storage',
                'status' => '1',
                'deleted' => '0',
                'password' => bcrypt('123456789'),
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'             => 3,
                'imie' => 'Agata',
                'nazwisko' => 'Fagata',
                'email' => 'fakt@fakty123.com',
                'login' => 'Fagaty',
                'code' => rand(0, 100),
                'avatar_type' => 'storage',
                'status' => '0',
                'deleted' => '0',
                'password' => bcrypt('123456789'),
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'             => 4,
                'imie' => 'Ania',
                'nazwisko' => 'Gala',
                'email' => 'ania@ania.com',
                'login' => 'ania123',
                'code' => rand(0, 100),
                'avatar_type' => 'storage',
                'status' => '0',
                'deleted' => '0',
                'password' => bcrypt('123456789'),
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'             => 5,
                'imie' => 'test',
                'nazwisko' => 'nazwisko',
                'email' => 'test@test.com',
                'login' => 'test',
                'code' => rand(0, 100),
                'avatar_type' => 'storage',
                'status' => '1',
                'deleted' => '0',
                'password' => bcrypt('123456789'),
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        User::insert($users);
    }
}
