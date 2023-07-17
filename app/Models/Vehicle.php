<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $table = 'vehicle';
    protected $dates = ['data_wstrzymania'];
    protected $fillable = [
        'taborowy',
        'marka',
        'model',
        'typ',
        'skrzynia',
        'pulpit',
        'produkcja',
        'zajezdnia',
        'przebieg',
        'klimatyzacja',
        'ogrzewanie',
        'brygadówka',
        'biletomat',
        'registration',
        'plate-type',
        'signature-type',
        'photo',
        'przegląd',
        'własciciel',
        'inne',
        'uwagi',
        'status',
        'powod_wstrzymania',
        'data_wstrzymania',
        'created_at',
        'updated_at',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
