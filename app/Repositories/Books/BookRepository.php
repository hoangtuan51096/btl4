<?php

namespace App\Repositories\Books;

use App\Models\Book;
use App\Repositories\Books\BookRepositoryInterface;

class BookRepository implements BookRepositoryInterface
{
    public function all()
    {

    }

    public function getList()
    {
        $listBooks = Book::with('author')->paginate(5);
        return $listBooks;
    }

    public function find($id)
    {
        $book = Book::where('id', $id)->with('author')->first();
        return $book;
    }

    public function update($attribute, $id)
    {
        $updateBook = Book::find($id);
        $updateBook->name = $attribute['name'];
        $updateBook->author_id = $attribute['author_id'];
        $updateBook->save();
        return $updateBook;
    }

    public function create($attribute)
    {
        $addBook = Book::create($attribute);
        return $addBook;
    }

    public function delete($id)
    {
    	$book = $this->find($id);
        if ($book) {
            $book->delete();
            return true;
        }
        return false;
    }

    public function getTrash()
    {
        $trashBook = Book::onlyTrashed()->get();
        return $trashBook;
    }

    public function restoreTrash($id)
    {
        $restoreBook = Book::withTrashed()->find($id);
        $restoreBook->restore();
        return $restoreBook;
    }

    public function hardDelete($id)
    {
        $deleteBook = Book::forceDelete($id);
        return $deleteBook;
    }
}