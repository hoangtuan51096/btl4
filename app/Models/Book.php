<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'author_id', 'name', 'status', 'user_delay', 'delay'
    ];
    
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'book_user', 'book_id', 'user_id')->withPivot('status', 'end_at');
    }
    public function bookUser()
    {
        return $this->hasMany(BookUser::class);
    }

    public function userDelay()
    {
        return $this->belongsTo('App\User', 'user_delay');
    }
}
