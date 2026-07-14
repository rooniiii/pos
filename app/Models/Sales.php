<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    public function customer()
{
    return $this->belongsTo(Customer::class);
}
    public function saleItems()
{
    return $this->hasMany(SaleItems::class, 'sale_id');
}


    protected $fillable = [
        'sub_total',

        'discount_percentage',
        'customer_id',
        'grand_total'
        

    ];
}