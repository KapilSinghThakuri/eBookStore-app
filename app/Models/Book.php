<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = [
    'title',
    'description',
    'author',
    'price',
    'image',
    'quantity',
    'rating',
    ];

public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_category', 'book_id', 'category_id')->withTimestamps();
    }
// public function orders()
// {
//     return $this->belongsToMany(Order::class,'book_order','book_id','order_id')->withTimestamps();
// }
}