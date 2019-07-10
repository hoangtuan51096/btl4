<?php

namespace App\Repositories\Users;

use App\Models\Book;
use App\Repositories\Books\BookRepositoryInterface;

class BookRepository implements BookRepositoryInterface
{
    public function getList()
    {
        $listBooks = Book::with('author')->paginate(5);
        return $listBooks;
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