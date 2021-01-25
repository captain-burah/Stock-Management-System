<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class StoreKeeper extends Authenticatable
{
    protected $table = 'store_keepers';
    protected $fillable = 
    [
        'fname', 'lname', 'email', 'password'
    ];

    protected $hidden = [
        'password'
    ];
}
