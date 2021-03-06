<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'github_id', 'facebook_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Social Accounts relation.
     * 
     * @return type
     */
    public function socialAccounts()
    {
        return $this->hasMany('App\Models\SocialAccount');
    }

    /**
     * Contacts relation.
     * 
     * @return type
     */
    public function contacts()
    {
        return $this->hasMany('App\Models\Contact');
    }

    /**
     * Accessor to identify user's active campaign list id.
     * 
     * @return type
     */
    public function getActiveCampaignListAttribute()
    {
        return $this->email."_list";
    }
}
