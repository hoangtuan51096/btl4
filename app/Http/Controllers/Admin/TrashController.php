<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Books\BookRepositoryInterface;
use App\Repositories\Authors\AuthorRepositoryInterface;
use App\Repositories\Users\UserRepositoryInterface;

class TrashController extends Controller
{
    protected $bookRepository;
    protected $authorRepository;
    protected $userRepository;

    public function __construct(
        BookRepositoryInterface $bookRepository,
        AuthorRepositoryInterface $authorRepository,
        UserRepositoryInterface $userRepository
    ) {
        $this->book = $bookRepository;
        $this->author = $authorRepository;
        $this->user = $userRepository;
    }

    public function getUserTrash(Request $request)
    {
        $trashUser = $this->user->getTrash();
        $status = 'user';
        if ($request->ajax()) {
            return view('admin.trash.paginate', compact('trashUser', 'status'));
        }
        return view('admin.trash.user-trash', compact('trashUser', 'status'));
    }

    public function getBookTrash(Request $request)
    {
        $authors = $this->author->all();
        $trashBook = $this->book->getTrash();
        $status = 'book';
        if ($request->ajax()) {
            return view('admin.trash.paginate', compact('trashBook', 'authors', 'status'));
        }
        return view('admin.trash.user-trash', compact('trashBook', 'authors', 'status'));
    }

    public function getAuthorTrash(Request $request)
    {
        $trashAuthor = $this->author->getTrash();
        $status = 'author';
        if ($request->ajax()) {
            return view('admin.trash.paginate', compact('trashAuthor', 'status'));
        }
        return view('admin.trash.user-trash', compact('trashAuthor', 'status'));
    }

    public function restoreBookTrash(Request $request)
    {
        $restoreBook = $this->book->restoreTrash($request->id);
        if ($restoreBook) {
            session()->flash('status', 'Phuc hoi sach thanh cong');
        } else {
            session()->flash('errors', 'Khong co tac gia nen khong thanh cong');
        }
        return redirect()->route('allTrashBook');
    }

    public function deleteBookTrash(Request $request)
    {
        $deleteBook = $this->book->hardDelete($request->id);
        if ($restoreBook) {
            session()->flash('status', 'Xoa sach thanh cong');
        } else {
            session()->flash('errors', 'Xoa khong thanh cong');
        }
        return redirect()->route('allTrashBook');
    }
}
