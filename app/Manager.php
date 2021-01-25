<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Manager extends Authenticatable
{
    protected $table = 'managers';
    protected $fillable = 
    [
        'fname', 'lname', 'email', 'password'
    ];

    protected $hidden = [
        'password'
    ];

    //public function stock()
    //{
    //    return $this->belongsToMany(Stock::class, 'sales', 
    //    'cashier_email', 'stock_id');
    //}
}