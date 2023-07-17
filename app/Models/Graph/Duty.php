<?php

namespace App\Models\Graph;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Duty extends Model
{
    use HasFactory;

    // Nazwa tabeli w bazie danych
    protected $table = 'duties';
    protected $dates = ['date'];

    // Klucz główny tabeli
    protected $fillable = [
        'date',
        'type',
        'status',
        'change',
        'isKzw',
        'is_reserve_assigned',
        'reason',
        'remarks',
        'user_id',
        'dysp_id',
        'canc_id',
        'stint_id',
        'bus_id',
    ];

    // Relacja z modelem "Employee"
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function dyspo()
    {
        return $this->belongsTo(User::class, 'dysp_id');
    }

    public function canceling()
    {
        return $this->belongsTo(User::class, 'canc_id');
    }

    public function stint()
    {
        return $this->belongsTo(User::class, 'stint_id');
    }

    public function bus()
    {
        return $this->belongsTo(User::class, 'bus_id');
    }

}
