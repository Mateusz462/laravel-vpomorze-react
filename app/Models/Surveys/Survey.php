<?php

namespace App\Models\Surveys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Surveys\Question;

class Survey extends Model
{
    use HasFactory;

    //protected $table = 'annouments';
    //protected $dates = ['date_to'];
    protected $fillable = [
        'name',
        'description',
        'footer',
        'status',
        'user_id',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'password',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function questions()
    {
        //return $this->belongsToMany(Question::class, 'surveys_as_questions', 'surveys_id', 'questions_id');
    //    return $this->hasMany(Question::class);
        return $this->hasMany(Question::class, 'id');
    }
}
