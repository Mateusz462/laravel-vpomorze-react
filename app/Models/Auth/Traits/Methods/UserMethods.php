<?php

namespace App\Models\Auth\Traits\Methods;

trait UserMethods
{
    /**
     * @return mixed
     */
    public function canChangeEmail()
    {
        return config('access.users.change_email');
    }

    /**
     * @return bool
     */
    public function canChangePassword()
    {
        return ! app('session')->has(config('access.socialite_session_name'));
    }

    /**
     * @param bool $size
     *
     * @throws \Illuminate\Container\EntryNotFoundException
     * @return bool|\Illuminate\Contracts\Routing\UrlGenerator|mixed|string
     */
    public function getPicture($size = false)
    {
        switch ($this->avatar_type) {
            case 'gravatar':
                if (!$size) {
                    $size = config('gravatar.default.size');
                }

                //return gravatar()->get($this->email, ['size' => $size]);

            case 'storage':
                return asset('storage/'.$this->avatar_location);
        }

        $social_avatar = $this->providers()->where('provider', $this->avatar_type)->first();

        if ($social_avatar && strlen($social_avatar->avatar)) {
            return $social_avatar->avatar;
        }

        return false;
    }

    /**
     * @param $provider
     *
     * @return bool
     */
    public function hasProvider($provider)
    {
        foreach ($this->providers as $p) {
            if ($p->provider == $provider) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return mixed
     */
    public function roletype()
    {
        return $this->roletype;
    }

    

    public function isEmployee()
    {
        return $this->hasRole('Nauczyciel');
    }

    public function isParent()
    {
        return $this->hasRole('Rodzic / Opiekun');
    }

    public function isUser()
    {
        return $this->hasRole('Uczeń');
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->status;
    }

    /**
     * @return bool
     */
    public function isConfirmed()
    {
        return $this->confirmed;
    }

    /**
     * @return bool
     */
    public function isPending()
    {
        return config('access.users.requires_approval') && ! $this->confirmed;
    }

    public function elo(){
        return $this->getPicture();
    }
}
