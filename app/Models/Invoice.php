<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\InvoiceItem;
use App\Models\MilestoneItem;
use App\Models\Dispute;
use App\Models\Review;
use Ramsey\Uuid\Uuid;

class Invoice extends Model
{
    protected $table = 'invoices';
    protected $fillable = [
    	'sender_id',
        'recipient_id',
        'uuid',
        'invoice_no',
    	'photo',
    	'note',
    	'secret_key',
    	'amount',
    	'invoice_link',
    	'status',
        'offline_ref_code',
        'sender_confirmed',
        'recipient_confirmed',
        'is_accepted',
        'invoice_type',
        'secret_key_updated_at',
        'is_disbursed',
    ];
    public $timestamps = true;

    /**
     * Boot the Model.
     */
     public static function boot()
     {
        parent::boot();

        static::creating(function (self $model) {
           $model->uuid = Uuid::uuid4()->toString();
        });
     }


    public function sender()
    {
        return $this->belongsTo('App\Models\User', 'sender_id');
    }

    public function recipient()
    {
        return $this->belongsTo('App\Models\User', 'recipient_id');
    }

    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function milestoneItems()
    {
        return $this->hasMany(MilestoneItem::class);
    }

    public function disputes()
    {
        return $this->hasOne(Dispute::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
