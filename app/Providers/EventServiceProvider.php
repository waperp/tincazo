<?php

namespace App\Providers;

use App\Observers\UuidObserver;
use App\tougrp;
use App\touinf;
use App\secusr;
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
        tougrp::observe(app(UuidObserver::class));
        secusr::observe(app(UuidObserver::class));
    }
}
