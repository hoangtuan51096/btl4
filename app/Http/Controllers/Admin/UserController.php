<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Users\UserRepositoryInterface;
use App\Http\Requests\UserRequest;
use Illuminate\Validation\Rule;

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
    
    public function destroy($id)
    {
        $deleteUser = $this->user->delete($id);
        if ($deleteUser) {
            session()->flash('status', 'Xoa tai khoan thanh cong');
        } else {
            session()->flash('errors', 'Xoa khong thanh cong');
        }
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
        return view('admin.users.update-user', compact('updateUser', 'rowid'));
    }

    public function getAllTrash()
    {
        $trashUser = $this->user->getTrash();
        return view('admin.trash.user-trash', compact('trashUser'));
    }

    public function restoreTrash(Request $request)
    {
        $restoreUser = $this->user->restoreTrash($request->id);
        if ($restoreUser) {
            session()->flash('status', 'Phuc hoi tai khoan thanh cong');
        } else {
            session()->flash('errors', 'Phuc hoi khong thanh cong');
        }
        return redirect()->route('allTrashUser');
    }

    public function deleteTrash(Request $request)
    {
        $deleteUser = $this->user->hardDelete($request->id);
        if ($deleteUser) {
            session()->flash('status', 'Xoa tai khoan thanh cong');
        } else {
            session()->flash('errors', 'Xoa khong thanh cong');
        }
        return redirect()->route('allTrashUser');
    }

    public function getUserRent()
    {
        $userRents = $this->user->getUserRent();
        return view('admin.users.list-user-rent', compact('userRents'));
    }

    public function getUserEndDate()
    {
        $userEndDates = $this->user->getUserEndDate();
        return view('admin.users.list-user-end-date', compact('userEndDates'));
    }
}
