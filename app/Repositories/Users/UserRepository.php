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

    public function find($id)
    {
        $detailUser = User::where('id', $id);

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