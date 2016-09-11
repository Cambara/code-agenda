<?php

namespace Agenda\Providers;

use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Agenda\Events\SomeEvent' => [
            'Agenda\Listeners\EventListener',
        ],
    ];
}
