<?php

namespace App\Listeners;

use App\Events\Invite;
use App\Mail\WelcomeInvitationMail;
use Illuminate\Support\Facades\Mail;

class SendEmailToUser
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
     * @param \App\Events\Invite $event
     * @return void
     */
    public function handle(Invite $event)
    {
        Mail::to($event->user->email)->send(
            new WelcomeInvitationMail()
        );
    }
}
