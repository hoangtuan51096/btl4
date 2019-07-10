<?php

namespace App\Repositories\Author;

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
        $listAuthor = Author::paginate(5);
        return $listAuthor;
    }

    public function find($id)
    {

    }

    public function update($attribute, $id)
    {

    }

    public function create($attribute)
    {

    }

    public function delete($id)
    {
    	
    }
}