<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OgraniczeniaPanel;
use Carbon\Carbon;

class OgraniczeniaPanelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OgraniczeniaPanel::insert([
            [
                'typ'  => 'logowanie',
                'status' => '1',
                'powod' => '',
                'user_id' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'typ'  => 'rejestracja',
                'status' => '1',
                'powod' => '',
                'user_id' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
