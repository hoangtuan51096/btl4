<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class BookUser extends Model
{
    protected $fillable = [
        'user_id', 'book_id', 'status', 'end_at'
    ];

    protected $table = 'book_user';

    public function books()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
