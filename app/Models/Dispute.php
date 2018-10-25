<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice;
use App\Models\Comment;
use Ramsey\Uuid\Uuid;

class Dispute extends Model
{
    protected $table = 'disputes';
    protected $fillable = [
    	'user_id',
    	'invoice_id',
    	'uuid',
    	'dispute_no',
    	'type',
    	'title',
        'response',
    	'status',
        'is_resolved',
        'is_refund'

    ];

    public $timestamps = true;

    public static function boot()
	{
	    parent::boot();

	    static::creating(function (self $model) {
	       $model->uuid = Uuid::uuid4()->toString();
	    });
	}

    
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function initiator()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
