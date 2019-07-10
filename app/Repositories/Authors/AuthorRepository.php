<?php

namespace App\Repositories\Authors;

use App\Models\Author;
use App\Repositories\Authors\AuthorRepositoryInterface;

class AuthorRepository implements AuthorRepositoryInterface
{
    public function all()
    {
        return Book::all();
    }

    public function getList()
    {
        $listAuthor = Author::with('book')->paginate(5);
        return $listAuthor;
    }

    public function find($id)
    {
        $author = Author::where('id', $id)->with('book')->first();
        return $author;
    }

    public function update($attribute, $id)
    {

    }

    public function create($attribute)
    {
        $addAuthor = Author::create($attribute);
        return $addAuthor;
    }

    public function delete($id)
    {
    	
    }
}