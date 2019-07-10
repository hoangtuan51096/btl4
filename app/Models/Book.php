<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

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
