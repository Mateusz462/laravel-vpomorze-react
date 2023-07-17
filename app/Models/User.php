<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;
use App\Models\Auth\Traits\Relationships\UserRelationships;
use App\Models\Auth\Traits\Methods\UserMethods;
use App\Models\Auth\Traits\Attributes\UserAttributes;
use App\Models\Worktime;
use App\Models\Graph\Duty;
use App\Models\Graph\Vacation;
use DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, UserAttributes, Notifiable, HasRoles, UserRelationships, UserMethods;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'imie',
        'nazwisko',
        'login',
        'email',
        'password',
        'avatar_type',
        'avatar_location',
        'code',
        'status',
        'deleted',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relacje z innymi modelemi
    public function vacation()
    {
        return $this->hasMany(Vacation::class, 'user_id');
    }

    public function worktimes()
    {
        return $this->hasMany(Worktime::class, 'user_id');
    }

    public function duties()
    {
        return $this->hasMany(Duty::class, 'user_id');
    }

    public function duties_dysp()
    {
        return $this->hasMany(Duty::class, 'dysp_id');
    }

    public function duties_canceling()
    {
        return $this->hasMany(Duty::class, 'canc_id');
    }

}
