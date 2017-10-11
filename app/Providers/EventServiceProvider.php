<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\NewBusiness' => [
            'App\Listeners\SendWelcomeMail',
        ],
        'App\Events\PasswordUpdate' => [
            'App\Listeners\PasswordUpdateEmail',
        ],
        'App\Events\DonationRequestReceived' => [
            'App\Listeners\RequestReceivedMail',
        ],
        'App\Events\NewSubBusiness' => [
            'App\Listeners\SendWelcomeMailSubOrg',
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

        //
    }
}
