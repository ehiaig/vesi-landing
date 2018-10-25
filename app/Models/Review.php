<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice;

class Review extends Model
{	
	protected $table = 'reviews';
    protected $fillable = [
    	'user_id',
    	'invoice_id',
    	'message',
    	'is_complete'
    ];

    public $timestamps = true;

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function sender()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
