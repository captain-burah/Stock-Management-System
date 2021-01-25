<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable = 
    [
        'fname', 'lname', 'email',
    ];

    public function sale() 
    {
        return $this->hasMany('App\Sale',
        'customer_id', 'id');
    }

}
