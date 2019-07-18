<?php

namespace App\Repositories\Books;

use App\Models\Book;
use App\Models\Author;
use App\Repositories\Books\BookRepositoryInterface;
use Auth;

class BookRepository implements BookRepositoryInterface
{
    public function all()
    {

    }

    public function getList()
    {
        $listBooks = Book::with('author', 'bookUser', 'users')->paginate(5);
        return $listBooks;
    }

    public function getListView()
    {
        $listBooks = Book::where('delay', DANGXEM)->with('author', 'bookUser', 'users')->paginate(5);
        return $listBooks;
    }

    public function getListRent()
    {
        $listBooks = Book::where('status', DANGMUON)->with('author', 'bookUser', 'users')->paginate(5);
        return $listBooks;
    }

    public function getListNone()
    {
        $listBooks = Book::where('status', CHUAMUON)->where('delay', CHUAXEM)->with('author', 'bookUser', 'users')->paginate(5);
        return $listBooks;
    }

    public function getListBookNone()
    {
        $listBooks = Book::where('status', CHUAMUON)
                        ->where('delay', '!=', DANGXEM)
                        ->orWhere('user_delay', Auth::id())
                        ->with('author', 'bookUser')->paginate(5);
        return $listBooks;
    }

    public function find($id)
    {
        $book = Book::where('id', $id)->with('author', 'bookUser')->first();
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
        $attribute['status'] = '0';
        $addBook = Book::create($attribute);
        return $addBook;
    }

    public function delete($id)
    {
    	$book = $this->find($id);
        if ($book->status == DANGMUON) {
            return false;
        }
        if ($book->delay == DANGXEM) {
            return false;
        }
        if ($book) {
            $book->delete();
            return true;
        }
        return false;
    }

    public function getTrash()
    {
        $trashBook = Book::onlyTrashed()->with('author')->get();
        return $trashBook;
    }

    public function restoreTrash($id)
    {
        $restoreBook = Book::withTrashed()->find($id);
        $authors = Author::all();
        foreach ($authors as $author) {
            if ($restoreBook->author_id == $author->id) {
                $restoreBook->restore();
                return true;
            }
        }
        return false;
    }

    public function hardDelete($id)
    {
        $deleteBook = Book::withTrashed()->find($id);
        $deleteBook->forceDelete();
        return $deleteBook;
    }

    public function delayBook($bookID, $userID)
    {
        $delayBook = Book::find($bookID);
        $bookDelays = Book::where('user_delay', $userID)->get();
        foreach ($bookDelays as $book) {
            $book->user_delay = null;
            $book->delay = CHUAXEM;
            $book->save();
        }
        $delayBook->user_delay = $userID;
        $delayBook->delay = DANGXEM;
        $delayBook->save();
        return $delayBook;
    }
    public function detailBook($bookId, $userId)
    {
        $detailBook = Book::where('id', $bookId)->with('author', 'bookUser')->first();
        if ($detailBook->delay == DANGXEM) {
            if ($detailBook->user_delay != Auth::id()) {
                return null;
            }
        }
        return $detailBook;
    }
}