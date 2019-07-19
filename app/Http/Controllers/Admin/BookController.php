<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Books\BookRepositoryInterface;
use App\Repositories\Authors\AuthorRepositoryInterface;
use App\Http\Requests\BookRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\CheckEndTime;
use App\Jobs\CheckEndTimeRentBook;
use App\Models\BookUser;

class BookController extends Controller
{
    protected $bookRepository;
    protected $authorRepository;

    public function __construct(BookRepositoryInterface $bookRepository, AuthorRepositoryInterface $authorRepository)
    {
        $this->book = $bookRepository;
        $this->author = $authorRepository;
    }

    public function getListBook(Request $request)
    {
        $authors = $this->author->all();
        $listBooks = $this->book->getList();
        $status = "all";
        if ($request->ajax()) {
            return view('admin.books.paginate', compact('listBooks', 'authors', 'status'));
        }
        return view('admin.books.list-book-ajax', compact('listBooks', 'authors', 'status'));
    }

    public function destroy($id)
    {
        $deleteBook = $this->book->delete($id);
        if ($deleteBook) {
            session()->flash('status', 'Xoa sach thanh cong');
        } else {
            session()->flash('errors', 'Khong the xoa quyen sach');
        }
        return redirect()->route('listBook');
    }

    public function addBook(BookRequest $request)
    {
        $addBook = $this->book->create($request->all());
        return view('admin.books.create-book', compact('addBook'));
    }

    public function editBookAjax(Request $request)
    {
        $authors = $this->author->getAllNow();
        $book = $this->book->find($request->id);
        $rowid = $request->rowid;
        return view('admin.books.edit-book', compact('authors', 'book', 'rowid'));
    }

    public function updateBookAjax(Request $request)
    {
        $updateBook = $this->book->update($request->all(), $request->id);
        $rowid = $request->rowid;
        return view('admin.books.update-book', compact('updateBook', 'rowid'));
    }

    public function cancelEditAjax(Request $request)
    {
        $book = $this->book->find($request->id);
        $rowid = $request->rowid;
        return view('admin.books.cancel-edit', compact('book', 'rowid'));
    }

    public function getBookView(Request $request)
    {
        $authors = $this->author->getAllNow();
        $listBooks = $this->book->getListView();
        $status = 'view';
        if ($request->ajax()) {
            return view('admin.books.paginate', compact('listBooks', 'authors', 'status'));
        }
        return view('admin.books.list-book-ajax', compact('listBooks', 'authors', 'status'));
    }

    public function getBookRent(Request $request)
    {
        $authors = $this->author->getAllNow();
        $listBooks = $this->book->getListRent();
        $status = 'rent';
        if ($request->ajax()) {
            return view('admin.books.paginate', compact('listBooks', 'authors', 'status'));
        }
        return view('admin.books.list-book-ajax', compact('listBooks', 'authors', 'status'));
    }

    public function getBookNone(Request $request)
    {
        $authors = $this->author->getAllNow();
        $listBooks = $this->book->getListNone();
        $status = 'none';
        if ($request->ajax()) {
            return view('admin.books.paginate', compact('listBooks', 'authors', 'status'));
        }
        return view('admin.books.list-book-ajax', compact('listBooks', 'authors', 'status'));
    }
}
