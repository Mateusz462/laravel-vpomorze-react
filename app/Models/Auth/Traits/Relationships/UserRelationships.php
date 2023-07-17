<?php

namespace App\Models\Auth\Traits\Relationships;

use App\Models\Auth\PasswordHistory;
use App\Models\Auth\SocialAccount;
// use Session;
use Spatie\Permission\Models\Role;

trait UserRelationships
{
    /**
     * @return mixed
     */
    public function providers()
    {
        return $this->hasMany(SocialAccount::class);
    }

    /**
     * @return mixed
     */
    public function passwordHistories()
    {
        return $this->hasMany(PasswordHistory::class);
    }

    /**
     * @return mixed
     */
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

    public function rolesglobal()
    {
        return $this->morphToMany(Role::class, 'model', 'model_has_roles', 'model_id')->where('prefix', '1');
    }

    public function rolesections()
    {
        return $this->morphToMany(Role::class, 'model', 'model_has_roles', 'model_id')->where('prefix', '!=', '1');
    }
}
