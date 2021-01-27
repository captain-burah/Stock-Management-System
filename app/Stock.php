<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Relations\MorphPivot;
//use Illuminate\Database\Eloquent\Relations\Pivot;

class Stock extends Model
{
    protected $table = 'stocks';
    protected $fillable = 
    [
        'name', 'size', 'quantity', 'color', 'category', 'brand_id', 'unit_price'
    ];

    public function sale() 
    {
        return $this->hasMany('App\Sale',
        'stock_id', 'id');
    }

    //public function cashier()
    //{
    //    return $this->belongsToMany(Cashier::class, 'sales', 
    //    'stock_id', 'cashier_email');  
    //}
}
