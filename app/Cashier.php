<?php

namespace App;
 
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Cashier extends Authenticatable
{
    protected $table = 'cashiers';
    protected $fillable = 
    [
        'fname', 'lname', 'email', 'password'
    ];

    protected $hidden = [
        'password'
    ];

    public function sale()
    {
        return $this->hasMany('App\Sale',
        'cashier_id', 'id');
    }
}