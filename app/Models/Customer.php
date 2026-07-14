<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


    class Customer extends Model
{

    public function sales()
{
    return $this->hasMany(Sales::class);
}
    protected $fillable = [
        'name',
        'phone',
        'email',
        'address'
    ];
}

