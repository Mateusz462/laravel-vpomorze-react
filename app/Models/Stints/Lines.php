<?php

namespace App\Models\Stints;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Worktime;
use App\Models\Duty;
use App\Models\Vacation;
use DB;

class Lines extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'suspended',
        'technic',
        'change_route',
        'color'
    ];

    // Relacje z innymi modelemi
    // public function vacation()
    // {
    //     return $this->hasMany(Vacation::class, 'user_id');
    // }

    // public function worktimes()
    // {
    //     return $this->hasMany(Worktime::class, 'user_id');
    // }

    // public function duties()
    // {
    //     return $this->hasMany(Duty::class, 'user_id');
    // }

    // public function duties_dysp()
    // {
    //     return $this->hasMany(Duty::class, 'dysp_id');
    // }

    // public function duties_canceling()
    // {
    //     return $this->hasMany(Duty::class, 'canc_id');
    // }

}
