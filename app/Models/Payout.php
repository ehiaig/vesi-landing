<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payout extends Model
{
    protected $table = 'payouts';
    protected $fillable = [
    	'user_id',
    	'bank_id',
    	'amount',
    	'status',
    	'is_paidout'
    ];
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function bankDetails()
    {
    	return $this->belongsTo('App\Models\BankDetail', 'bank_id');
    }
}
