<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice;

class InvoiceItem extends Model
{
    protected $table = 'invoice_items';
    protected $fillable = [
    	'invoice_id',
    	'name',
    	'price',
    	'tax',
    	'shipping_cost',
    	'description',
        'photo',
    	'quantity',
    ];
    public $timestamps = true;

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    // public function getItemPriceAttribute() 
    // {
    //     return $this->quantity * $this->price;
    // }
}
