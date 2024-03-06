<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;
    protected $table = 'shopping_carts';
    protected $fillable = [
        'user_id',
        'book_id',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'cart_order','cart_id','order_id')->withTimestamps();
    }
}
