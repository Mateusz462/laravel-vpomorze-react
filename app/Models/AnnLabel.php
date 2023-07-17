<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnLabel extends Model
{
    use HasFactory;

    protected $table = 'annouments_tags';
    public  $timestamps = false;
    protected $fillable = [
        'name',
        'color'
    ];
}
