<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Books\BookRepositoryInterface;
use App\Http\Requests\RentBookRequest;
use Carbon\Carbon;
use Auth;
use App\Jobs\Example;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function viewRentBook(Request $request)
    {
        $detailBook = $this->book->find($request->book_id);
        return view('books.rent-book', compact('detailBook'));
    }

    public function viewDetailBook(Request $request)
    {
        $delayBook = $this->book->delayBook($request->id, Auth::id());
        $detailBook = $this->book->find($request->id);
        Example::dispatch($request->id);
        ResetDelayBook::dispatch($request->id)
                ->delay(now()->addMinutes(10));
        return view('books.detail-book', compact('detailBook'));
    }
}
