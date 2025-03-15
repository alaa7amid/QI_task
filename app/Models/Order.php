<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = ['user_id', 'address', 'total_price', 'status'];

    public function items()
    {
        return $this->hasMany(OrderItems::class);
    }
}
