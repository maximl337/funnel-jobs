<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\NewMessageEvent' => [
            'App\Listeners\NewMessageListener',
        ],
        'App\Events\NewJobEvent' => [
            'App\Listeners\NewJobListener',
        ],
        'App\Events\NewBidEvent' => [
            'App\Listeners\NewBidListener',
        ],
        'App\Events\JobAwardedEvent' => [
            'App\Listeners\JobAwardedListener',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
