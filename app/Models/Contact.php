<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'slug'
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
}
