<?php

namespace App\Repositories\Authors;

use App\Models\Author;
use App\Models\Book;
use App\Repositories\Authors\AuthorRepositoryInterface;

class AuthorRepository implements AuthorRepositoryInterface
{
    public function all()
    {
        $authors = Author::withTrashed()->get();
        return $authors;
    }

    public function getList()
    {
        $listAuthor = Author::with('books')->paginate(5);
        return $listAuthor;
    }

    public function find($id)
    {
        $author = Author::where('id', $id)->with('books')->first();
        return $author;
    }

    public function update($attribute, $id)
    {
        $updateAuthor = Author::find($id);
        $updateAuthor->name = $attribute['name'];
        $updateAuthor->save();
        return $updateAuthor;
    }

    public function create($attribute)
    {
        $addAuthor = Author::create($attribute);
        return $addAuthor;
    }

    public function delete($id)
    {
        $author = Author::where('id', $id)->with('books')->first();
        if ($author->books->isEmpty()) {
            $author->delete();
            return true;
        } else {
            foreach ($author->books as $book) {
                if ($book->status == DANGMUON) {
                    return false;
                }
                if ($book->delay == DANGXEM) {
                    return false;
                }
            }
            foreach ($author->books as $book) {
                $book = Book::find($book->id);
                $book->delete();
            }
            $author->delete();
            return true;
        }
    }

    public function getTrash()
    {
        $trashAuthor = Author::onlyTrashed()->paginate(5);
        return $trashAuthor;
    }

    public function restoreTrash($id)
    {
        $restoreAuthor = Author::withTrashed()->find($id);
        $restoreAuthor->restore();
        if ($restoreAuthor) {
            return true;
        } else {
            return false;
        }
    }

    public function hardDelete($id)
    {
        $deleteAuthor = Author::withTrashed()->find($id);
        $deleteAuthor->forceDelete();
        return $deleteAuthor;
    }

    public function getAllNow()
    {
        $authors = Author::all();
        return $authors;
    }
}
