<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\CheckEndTime;
use App\Models\BookUser;
use Illuminate\Support\Facades\Mail;

class CheckEndTimeRentBook implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct()
    {
        //
    }

    public function handle()
    {
        $bookUsers = BookUser::where('status', DANGMUON)->with('users', 'books')->get();
        foreach ($bookUsers as $bookUser) {
            if ($bookUser->end_at < now()) {
                Mail::to($bookUser->users->email)->send(new CheckEndTime($bookUser));
            }
        }
    }
}
