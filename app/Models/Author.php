<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    public $timetamps = true;

    protected $fillable = ['name', 'nationality', 'biography', 'created_at', 'updated_at'];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'books_authors', 'author_id', 'book_id');
    }
}