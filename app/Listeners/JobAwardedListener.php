<?php

namespace App\Listeners;

use App\Events\JobAwardedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class JobAwardedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  JobAwardedEvent  $event
     * @return void
     */
    public function handle(JobAwardedEvent $event)
    {
        //
    }
}
