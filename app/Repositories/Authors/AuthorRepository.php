<?php

namespace App\Repositories\Authors;

use App\Models\Author;
use App\Repositories\Authors\AuthorRepositoryInterface;

class AuthorRepository implements AuthorRepositoryInterface
{
    public function all()
    {
        return Author::all();
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
    	$author = $this->find($id);
        if ($author) {
            $author->delete();
            return true;
        }
        return false;
    }

    public function getTrash()
    {
        $trashAuthor = Author::onlyTrashed()->get();
        return $trashAuthor;
    }

    public function restoreTrash($id)
    {
        $restoreAuthor = Author::withTrashed()->find($id);
        $restoreAuthor->restore();
        return $restoreAuthor;
    }

    public function hardDelete($id)
    {
        $deleteAuthor = Author::forceDelete($id);
        return $deleteAuthor;
    }
}