<?php

namespace App\Providers;

use App\Observers\UuidObserver;
use App\touinf;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        $this->registerUuidObservers();
    }

    public function registerUuidObservers()
    {
        touinf::observe(app(UuidObserver::class));
    }
}
