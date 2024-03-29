<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Users\UserRepositoryInterface;
use App\Repositories\BookUser\BookUserRepositoryInterface;
use App\Repositories\Books\BookRepositoryInterface;
use App\Rules\CheckEndTime;
use Auth;
use App\Http\Requests\RentBookRequest;

class UserController extends Controller
{
    protected $userRepository;
    protected $bookUserRepository;
    protected $bookRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        BookUserRepositoryInterface $bookUserRepository,
        BookRepositoryInterface $bookRepository
    ) {
        $this->user = $userRepository;
        $this->bookUser = $bookUserRepository;
        $this->book = $bookRepository;
    }

    public function rentBook(RentBookRequest $request)
    {
        $checkUserRenting = $this->bookUser->checkUserRentBook(Auth::id());
        if ($checkUserRenting) {
            session()->flash('error', 'Ban khong the muon them sach');
        } else {
            $rentBook = $this->bookUser->rentBook($request->all(), Auth::id());
            session()->flash('status', 'Muon sach thanh cong');
        }
        return redirect()->route('book-client.index');
    }

    public function viewGiveBackBook()
    {
        $detailUser = $this->bookUser->getBookRenting(Auth::id());
        if ($detailUser == null) {
            return view('give-back-book', compact('detailUser'));
        } else {
            $detailBook = $this->book->find($detailUser->book_id);
            return view('give-back-book', compact('detailUser', 'detailBook'));
        }
    }

    public function giveBackBook(Request $request)
    {
        $giveBack = $this->bookUser->giveBackBook($request->all());
        session()->flash('status', 'Tra sach thanh cong');
        return redirect()->route('viewGiveBackBook');
    }
}
