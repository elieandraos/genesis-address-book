<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactField extends Model
{
    protected $table = "contacts_fields";
    public $fillable = ['value', 'contact_id'];
    public $timestamps = false;

    /**
     * Contact relation.
     * 
     * @return type
     */
    public function contact()
    {
    	return $this->belongsTo('App\Models\Contact');
    }
}
