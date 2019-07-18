<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\BookUser;
use App\Mail\CheckEndTime;
use Illuminate\Support\Facades\Mail;
use App\User;

class CheckBook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:check-book';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check qua han cac quyen sach cho muon';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $admin = User::where('role', 'admin')->first();
        $bookUsers = BookUser::where('status', DANGMUON)->with('users', 'books')->get();
        foreach ($bookUsers as $bookUser) {
            if ($bookUser->end_at < now()) {
                Mail::to($bookUser->users->email)->send(new CheckEndTime($bookUser));
                Mail::to($admin->email)->send(new CheckEndTime($bookUser));
            }
        }
    }
}
