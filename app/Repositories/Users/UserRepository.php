<?php

namespace App\Repositories\Users;

use App\User;
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
        $detailUser = User::where('id', $id)->first();
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
        $addUser = User::create($attribute);
        return $addUser;
    }

    public function delete($id)
    {
        $user = $this->find($id);
        if ($user) {
            $user->delete();
            return true;
        }
        return false;
    }
}