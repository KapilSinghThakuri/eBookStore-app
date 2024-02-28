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
    'rating',
    ];

public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_category', 'book_id', 'category_id')->withTimestamps();
    }
}