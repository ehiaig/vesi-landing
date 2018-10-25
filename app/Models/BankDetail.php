<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Payouts;
use Ramsey\Uuid\Uuid;

class BankDetail extends Model
{
    protected $table = 'bank_details';
    protected $fillable = [
    	'user_id',
    	'uuid',
    	'bank',
    	'account_name',
    	'account_no',
    ];
    public $timestamps = true;

    public static function boot()
	{
	    parent::boot();

	    static::creating(function (self $model) {
	       $model->uuid = Uuid::uuid4()->toString();
	    });
	}

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function payouts()
    {
    	return $this->hasMany(Payouts::class);
    }
}
