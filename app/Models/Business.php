<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $table = 'businesses';
    protected $fillable = [
        'user_id',
    	'business_name',
    	'business_email',
    	'business_address',
    	'business_type',
    	'business_description',
    	'access_token',
    	'state',
    	'city',
    	'country'
    ];
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
