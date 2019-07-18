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

    public function __construct(
        BookRepositoryInterface $bookRepository,
        AuthorRepositoryInterface $authorRepository)
    {
        $this->book = $bookRepository;
        $this->author = $authorRepository;
    }

    public function index()
    {
        $authors = $this->author->all();
        $listBooks = $this->book->getList();
        return view('admin.books.list-books', compact('listBooks', 'authors'));
    }

    public function destroy($id)
    {
        $deleteBook = $this->book->delete($id);
        if ($deleteBook) {
            session()->flash('status', 'Xoa sach thanh cong');
        } else {
            session()->flash('errors', 'Khong the xoa quyen sach');
        }
        return redirect()->route('book.index');
    }

    public function addBook(BookRequest $request)
    {
        $addBook = $this->book->create($request->getAllNow());
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

    public function getAllTrash()
    {
        $authors = $this->author->all();
        $trashBook = $this->book->getTrash();
        return view('admin.trash.book-trash', compact('trashBook', 'authors'));
    }

    public function restoreTrash(Request $request)
    {
        $restoreBook = $this->book->restoreTrash($request->id);
        if ($restoreBook) {
            session()->flash('status', 'Phuc hoi sach thanh cong');
        } else {
            session()->flash('errors', 'Khong co tac gia nen khong thanh cong');
        }
        return redirect()->route('allTrashBook');
    }

    public function deleteTrash(Request $request)
    {
        $deleteBook = $this->book->hardDelete($request->id);
        if ($restoreBook) {
            session()->flash('status', 'Xoa sach thanh cong');
        } else {
            session()->flash('errors', 'Xoa khong thanh cong');
        }
        return redirect()->route('allTrashBook');
    }

    public function cancelEditAjax(Request $request)
    {
        $authors = $this->author->getAllNow();
        $book = $this->book->find($request->id);
        $rowid = $request->rowid;
        return view('admin.books.cancel-edit', compact('authors', 'book', 'rowid'));
    }

    public function getBookView(Request $request)
    {
        $authors = $this->author->getAllNow();
        $listBookView = $this->book->getListView();
        return view('admin.books.list-book-view', compact('listBookView', 'authors'));
    }

    public function getBookRent(Request $request)
    {
        $authors = $this->author->getAllNow();
        $listBookRent = $this->book->getListRent();
        return view('admin.books.list-book-rent', compact('listBookRent', 'authors'));
    }

    public function getBookNone(Request $request)
    {
        $authors = $this->author->getAllNow();
        $listBookNone = $this->book->getListNone();
        return view('admin.books.list-book-none', compact('listBookNone', 'authors'));
    }
}
