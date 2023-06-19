<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Events\RealTimeMessage;
use App\Events\NotificationReceived;
use App\Events\RealTimeMessagePrivate;
use App\Notifications\RealTimeNotification;

class NotificationTestController extends Controller
{
    public function sendNotification()
    {

        event(new RealTimeMessage('Hello World'));

        event(new NotificationReceived('Hello World')); // Trigger the event

        event(new RealTimeMessagePrivate('Hello World')); // Trigger the event

        $user = User::first();
        $user->notify(new RealTimeNotification('Hello World'));


        dd('send notification');
    }
}
