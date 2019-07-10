<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'author_id', 'name'
    ];
    
    public function author()
    {
    	return $this->belongsTo(Author::class);
    }

    public function userBook()
    {
    	return $this->hasMany(UserBook::class);
    }
}
