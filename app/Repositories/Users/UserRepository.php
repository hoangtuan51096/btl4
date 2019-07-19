<?php

namespace App\Repositories\Users;

use App\User;
use App\Models\BookUser;
use App\Models\Book;
use App\Repositories\Users\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function all()
    {
        return User::all();
    }

    public function getList()
    {
        return User::paginate(5);
    }

    public function find($id)
    {
        $detailUser = User::where('id', $id)->with('books')->first();
        return $detailUser;
    }

    public function update($attribute, $id)
    {
        $user = User::find($id);
        $user->name = $attribute['name'];
        $user->save();
        return $user;
    }

    public function create($attribute)
    {
        $attribute['password'] = bcrypt($attribute['password']);
        $addUser = User::create($attribute);
        return $addUser;
    }

    public function delete($id)
    {

        $bookRent = BookUser::where('user_id', $id)->get();
        foreach ($bookRent as $user) {
            if ($user->status == DANGMUON) {
                return false;
            }
        }
        $book = Book::where('user_delay', $id)->first();
        if ($book != null) {
            $book->user_delay = null;
            $book->save();
        }
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return true;
        }
        return false;
    }

    public function getTrash()
    {
        $trashUser = User::onlyTrashed()->get();
        return $trashUser;
    }

    public function restoreTrash($id)
    {
        $restoreUser = User::withTrashed()->find($id);
        $restoreUser->restore();
        if ($restoreUser) {
            return true;
        } else {
            return false;
        }
    }

    public function hardDelete($id)
    {
        $deleteUser = User::withTrashed()->find($id);
        $deleteUser->forceDelete();
        if ($deleteUser) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserRent()
    {
        $userRents = BookUser::where('status', DANGMUON)->with('books', 'users')->paginate(5);
        return $userRents;
    }

    public function getUserEndDate()
    {
        $userEndDates = BookUser::where('status', DANGMUON)
                            ->where('end_at', '<', now())
                            ->with('books', 'users')->paginate(5);
        return $userEndDates;
    }
}
