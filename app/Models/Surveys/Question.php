<?php

namespace App\Models\Surveys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'surveys_questions';
    //protected $dates = ['date_to'];
    protected $fillable = [
        'order',
        'content',
        'type',
        'minAnswers',
        'maxAnswers',
        'displayWay',
        'required',
    ];

}
