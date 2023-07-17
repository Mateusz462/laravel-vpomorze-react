<?php

namespace App\Models\Graph;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacation extends Model
{
    use HasFactory;

    protected $table = 'vacations';
    protected $dates = ['date','date_from','date_to'];

    // Klucz główny tabeli
    protected $fillable = [
        'date',
        'type',
        'date_from',
        'date_to',
        'numberofdays',
        'reason',
        'status',
        'user_id',
        'approved_id',
    ];

    // Relacja z modelem "Employee"
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function approved()
    {
        return $this->belongsTo(User::class, 'approved_id');
    }
}
