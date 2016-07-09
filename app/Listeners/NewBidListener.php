<?php

namespace App\Listeners;

use Auth;
use App\User;
use Mail;
use App\Events\NewBidEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewBidListener
{

    protected $mailer;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Mail $mail)
    {
        $this->mailer = $mail;
    }

    /**
     * Handle the event.
     *
     * @param  NewBidEvent  $event
     * @return void
     */
    public function handle(NewBidEvent $event)
    {
        $data = $event->data;

        $job = $data['job'];

        $user = $data['user'];

        $recipient = $job->user()->first();

        $subject = "There is a new Bid on a Job you posted";

        Mail::send('emails.new_bid', $data, function ($m) use ($recipient, $subject) {
                $m->to($recipient->email, $recipient->name)->subject($subject);
            });

    }
}
