<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AnnLabel;
use App\Models\Ogloszenia;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AnnoumentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AnnLabel::insert([
            [
                'name'  => 'ziel0ono mi',
                'color' => '#32c42d'
            ],
            [
                'name'  => 'limonkowo miii',
                'color' => '#a9dd49'
            ]
        ]);

        Ogloszenia::insert([
            [
                'title' => Str::random(10),
                'date_n' => 1,
                'date_to' => 0,
                'text' => Str::random(150),
                'discord' => 0,
                'is_pinned' => 0,
                'status' => 1,
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => Str::random(10),
                'date_n' => 1,
                'date_to' => 0,
                'text' => Str::random(150),
                'discord' => 0,
                'is_pinned' => 0,
                'status' => 1,
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => Str::random(10),
                'date_n' => 1,
                'date_to' => 0,
                'text' => Str::random(150),
                'discord' => 0,
                'is_pinned' => 0,
                'status' => 1,
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        DB::table('tags_has_annouments')->insert([
            [
                'tag_id' => 1,
                'ann_id' => 1
            ],
            [
                'tag_id' => 2,
                'ann_id' => 1
            ],
            [
                'tag_id' => 1,
                'ann_id' => 2
            ],
        ]);
    }
}
