<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Worktime extends Model
{
    use HasFactory;
    // Nazwa tabeli w bazie danych
    protected $table = 'users_worktime';

    // Klucz główny tabeli
    protected $primaryKey = 'id';

    // Inne wartości domyślne
    public $timestamps = false;
    protected $guarded = [];

    // Relacja z modelem "Employee"
    public function employee()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
