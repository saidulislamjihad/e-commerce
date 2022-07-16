<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'vendor_id', 'product_id', 'qty', 'price', 'orderId'];

    //===================================== Relationship ======================================//

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->with('shipping', 'billing', 'payment', 'order');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class)->with('product');
    }
}
