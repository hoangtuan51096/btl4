<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Users\UserRepositoryInterface;
use App\Http\Requests\UserRequest;
use Validator;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->user = $userRepository;
    }

    public function index()
    {
        $allUsers = $this->user->getList();
        return view('admin.users.list-users', compact('allUsers'));
    }

    public function create()
    {
        //
    }

    public function store(UserRequest $request)
    {
        $addUser = $this->user->create($request->all());
        return view('admin.users.create', compact('addUser'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $deleteUser = $this->user->delete($id);
        return redirect()->route('user.index');
    }

    public function addUser(UserRequest $request)
    {
        $addUser = $this->user->create($request->all());
        return view('admin.users.create-user', compact('addUser'))->render();
    }

    public function editUserAjax(Request $request)
    {
        $user = $this->user->find($request->id);
        $rowid = $request->rowid;
        return view('admin.users.edit-user', compact('user', 'rowid'));
    }
    public function updateUserAjax(Request $request)
    {
        $updateUser = $this->user->update($request->all(), $request->id);
        $rowid = $request->rowid;
        return view('admin.users.update-user', compact('updateUsers', 'rowid'));
    } 
}
