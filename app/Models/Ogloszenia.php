<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AnnLabel;

class Ogloszenia extends Model
{
    use HasFactory;

    protected $table = 'annouments';
    protected $dates = ['date_to'];
    protected $fillable = [
        'title',
        'date_n',
        'date_to',
        'text',
        'discord',
        'is_pinned',
        'status',
        'user_id',
        'created_at',
        'updated_at',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(AnnLabel::class, 'tags_has_annouments', 'ann_id', 'tag_id');
    }
}
