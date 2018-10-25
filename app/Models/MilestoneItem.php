<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice;

class MilestoneItem extends Model
{
	protected $table = 'milestone_items';
    protected $fillable = [
    	'invoice_id',
    	'name',    	
    	'tax',
    	'shipping_cost',
    	'description',
    	'quantity',
        'price',
    	'inspection_period',
        'milestone_key',
    	'sender_confirmed',
    	'recipient_confirmed',
        'milestone_status'
    ];
    public $timestamps = true;

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
