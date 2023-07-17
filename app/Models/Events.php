<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AnnLabel;

class Events extends Model
{
    use HasFactory;

    protected $table = 'events';
    protected $dates = ['date_to', 'hour_to'];
    protected $fillable = [
        'title',
        'text',
        'description',
        'date_to',
        'hour_to',
        'image',
        'user_id',
        'created_at',
        'updated_at',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    // public function tags()
    // {
    //     return $this->belongsToMany(AnnLabel::class, 'tags_has_annouments', 'ann_id', 'tag_id');
    // }
}
