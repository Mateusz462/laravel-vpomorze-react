<?php

namespace App\Models\Stints;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\Worktime;
use App\Models\Duty;
use App\Models\Stints\Stints;
use DB;

class Brigade extends Model
{
    use HasFactory;
    protected $table = 'stints_brigade';

    protected $fillable = [
        'number',
        'typ_pojazdu',
        'night',
        'old_vehicles',
        'time_departure',
        'time_exit',
        'stints_id',
        'carriers_id',
    ];

    protected function typ_pojazdu(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    } 

    // Relacje z innymi modelemi
    public function stint()
    {
        return $this->belongsTo(Stints::class, 'stints_id');
    }

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
