<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Books\BookRepositoryInterface;
use App\Http\Requests\RentBookRequest;
use Carbon\Carbon;
use Auth;
use App\Jobs\Example;
use App\Jobs\CheckEndTimeRentBook;
use App\Jobs\ResetDelayBook;

class BookController extends Controller
{
    protected $bookRepository;

    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->book = $bookRepository;
    }

    public function index()
    {
        $listBooks = $this->book->getListBookNone();
        return view('books.list-books', compact('listBooks'));
    }

    public function viewRentBook(Request $request)
    {
        $detailBook = $this->book->find($request->book_id);
        return view('books.rent-book', compact('detailBook'));
    }

    public function viewDetailBook(Request $request)
    {
        $detailBook = $this->book->detailBook($request->id, Auth::id());
        $delayBook = $this->book->delayBook($request->id, Auth::id());
        ResetDelayBook::dispatch($request->id)
                ->delay(now()->addMinutes(5));
        return view('books.detail-book', compact('detailBook'));
    }
}
