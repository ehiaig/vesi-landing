<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Ramsey\Uuid\Uuid;
use App\Models\Invoice;
use App\Models\Business;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 
        'lastname', 
        'account_balance', 
        'phone',
        'email',
        'password',
        'verified',
        'user_type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = [
        'full_name',
    ];

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

     public function getFullNameAttribute()
     {
        return $this->firstname . ' ' . $this->lastname;
     }

     public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function business()
    {
        return $this->hasOne(Business::class);
    }

        public function verifyUser()
    {
        return $this->hasOne('App\Models\VerifyUser');
    }
}
