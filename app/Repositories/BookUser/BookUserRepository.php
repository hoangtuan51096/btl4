<?php

namespace App\Repositories\BookUser;

use App\Models\BookUser;
use App\Models\Book;
use App\Repositories\BookUser\BookUserRepositoryInterface;

class BookUserRepository implements BookUserRepositoryInterface
{
    public function all()
    {
        return BookUser::all();
    }

    public function getList()
    {
        //
    }

    public function find($id)
    {
        //
    }

    public function update($attribute, $id)
    {
        $user = BookUser::find($id);
        $user->name = $attribute['name'];
        $user->save();
        return $user;
    }

    public function create($attribute)
    {
        $addUser = BookUser::create($attribute);
        return $addUser;
    }

    public function delete($id)
    {
        //
    }

    public function getBookRenting($userId)
    {
        $bookRenting = BookUser::where('user_id', $userId)
                                ->where('status', '1')
                                ->with('books', 'users')->first();
        return $bookRenting;
    }

    public function giveBackBook($data)
    {
        $bookUserUpdate = BookUser::where('user_id', $data['user_id'])
                                ->where('book_id', $data['book_id'])
                                ->update(['status'=> 0]);
        $book = Book::where('id', $data['book_id'])->update(['status'=> 0]);
        return $bookUserUpdate;
    }

    public function checkUserRentBook($userId)
    {
        $user = BookUser::where('user_id', $userId)
                        ->where('status', 1)->first();
        if (empty($user)) {
            return false;
        } else {
            return true;
        }
    }

    public function rentBook($data, $userId)
    {
        $bookUser = BookUser::where('user_id', $userId)
                            ->where('book_id', $data['id'])
                            ->first();
        if (empty($bookUser)) {
            $dataBookUser = ([
                'user_id' => $userId,
                'book_id' => $data['id'],
                'end_at' => $data['end_at'],
                'status' => 1
            ]);
            $addUser = BookUser::create($dataBookUser);
            return $addUser;
        } else {
            $bookUser->status = 1;
            $bookUser->end_at = $data['end_at'];
            $bookUser->save();
            $book = Book::find($data['id']);
            $book->status = 1;
            $book->save();
            return $bookUser;
        }
    }
}
