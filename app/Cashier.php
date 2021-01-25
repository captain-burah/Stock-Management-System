<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cashier extends Model
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