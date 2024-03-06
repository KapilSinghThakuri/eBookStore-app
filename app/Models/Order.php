<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'province',
        'city',
        'street',
        'payment_method',
        'order_status',
        'order_date',
    ];
    public $timestamps = false;

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function shoppingcarts()
    {
        return $this->belongsToMany(ShoppingCart::class, 'cart_order','order_id','cart_id')->withTimestamps();
    }
    // public function books()
    // {
    //     return $this->belongsToMany(Book::class, 'book_order','order_id','book_id')->withTimestamps();
    // }
}
