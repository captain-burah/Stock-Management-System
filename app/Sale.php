<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sale';
    protected $fillable = 
    [
        'quantity', 'unit_price', 'total_price'
    ];


    public function cashier()
    {
        return $this->belongsTo('App\Cashier', 'cashier_id');
    }

    public function stock()
    {
        return $this->belongsTo('App\Stock',  'stock_id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id');
    }
}
