<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Todo;
use Mail;
use Auth;
use Illuminate\Support\Facades\DB;

class SendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:sendmail';

    /**
     * The console command description.
     *
     * ->get()@var str/
    protected $description = 'Send mail to all user with has todo data in todo table';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
     $data=['title'=>"Thanks to use my TODO APP"];       
     $userEmail = User::select('email','name')->get();
     $emails = []; 
     foreach($userEmail as $email)
     {
        $emails[] = $email['email'];
     }      
     Mail::send('email',$data, function($message) use ($emails)
     {
        $message->to($emails)->subject('Thanks to use my TODO APP !');
     });
    }
}