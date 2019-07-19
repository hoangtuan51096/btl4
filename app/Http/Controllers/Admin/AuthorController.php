<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Authors\AuthorRepositoryInterface;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{
    protected $authorRepository;

    public function __construct(AuthorRepositoryInterface $authorRepository)
    {
        $this->author = $authorRepository;
    }

    public function index(Request $request)
    {
        $listAuthors = $this->author->getList();
        if ($request->ajax()) {
            return view('admin.authors.paginate', compact('listAuthors'));
        }
        return view('admin.authors.list-authors', compact('listAuthors'));
    }

    public function destroy($id)
    {
        $deleteAuthor = $this->author->delete($id);
        if ($deleteAuthor) {
            session()->flash('status', 'Xoa tac gia thanh cong');
        } else {
            session()->flash('errors', 'Khong the tac gia quyen sach');
        }
        return redirect()->route('author.index');
    }
    
    public function addAuthor(AuthorRequest $request)
    {
        $addAuthor = $this->author->create($request->all());
        return view('admin.authors.create-author', compact('addAuthor'))->render();
    }

    public function editAuthorAjax(Request $request)
    {
        $author = $this->author->find($request->id);
        $rowid = $request->rowid;
        return view('admin.authors.edit-author', compact('author', 'rowid'));
    }

    public function cancelEditAjax(Request $request)
    {
        $author = $this->author->find($request->id);
        $rowid = $request->rowid;
        return view('admin.authors.cancel-edit', compact('author', 'rowid'));
    }

    public function updateAuthorAjax(Request $request)
    {
        $updateAuthor = $this->author->update($request->all(), $request->id);
        $rowid = $request->rowid;
        return view('admin.authors.update-author', compact('updateAuthor', 'rowid'));
    }

    public function restoreTrash(Request $request)
    {
        $restoreAuthor = $this->author->restoreTrash($request->id);
        if ($restoreAuthor) {
            session()->flash('status', 'Phuc hoi thanh cong');
        } else {
            session()->flash('errors', 'Phuc hoi khong thanh cong');
        }
        return redirect()->route('allTrashAuthor');
    }

    public function deleteTrash(Request $request)
    {
        $deleteAuthor = $this->author->hardDelete($request->id);
        if ($deleteAuthor) {
            session()->flash('status', 'Xoa tac gia thanh cong');
        } else {
            session()->flash('errors', 'Khong the tac gia quyen sach');
        }
        return redirect()->route('allTrashAuthor');
    }
}
