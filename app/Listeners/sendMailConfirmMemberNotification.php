<?php

namespace App\Listeners;

use App\Events\sendMailConfirmMemberEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class sendMailConfirmMemberNotification implements ShouldQueue
{
    public $tries = 3;

    public $timeout = 120;
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(sendMailConfirmMemberEvent $event): void
    {
        Mail::send('sendMail.sendMailConfirmMember',compact(['event']),function ($email) use ($event){
            $email->subject('Xác nhận tham gia không gian làm việc !');
            $email->to($event->member->email_member);
        });
    }
}
