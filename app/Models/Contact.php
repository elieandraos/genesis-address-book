<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'user_id'
    ];

    /**
     * User relation.
     * 
     * @return type
     */
    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }

    /**
     * Contacts fields relation.
     * 
     * @return type
     */
    public function fields()
    {
        return $this->hasMany('App\Models\ContactField');
    }
}
