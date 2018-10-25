<?php

namespace App\Models;
use App\Models\Dispute;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = [
    	'user_id',
    	'dispute_id',
        'message',
    	'photo',

    ];

    public $timestamps = true;

    public function disputes()
    {
        return $this->belongsTo(Dispute::class);
    }

    public function sender()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
