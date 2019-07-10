<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Books\BookRepositoryInterface;
use App\Repositories\Authors\AuthorRepositoryInterface;

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

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
        $deleteBook = $this->book->delete($id);
        return redirect()->route('book.index');
    }

    public function addBook(Request $request)
    {
        $addBook = $this->book->create($request->all());
        return view('admin.books.create-book', compact('addBook'))->render();
    }

    public function editBookAjax(Request $request)
    {
        $authors = $this->author->all();
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
        $trashBook = $this->book->getTrash();
        return view('admin.trash.book-trash', compact('trashBook'));
    }

    public function restoreTrash(Request $request)
    {
        $restoreBook = $this->book->restoreTrash($request->id);
        return redirect()->route('book.index');
    }

    public function deleteTrash(Request $request)
    {
        $deleteBook = $this->book->hardDelete($request->id);
        return redirect()->route('book.index');
    }
}
