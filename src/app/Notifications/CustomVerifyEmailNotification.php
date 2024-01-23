<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;
class CustomVerifyEmailNotification extends   VerifyEmailBase implements ShouldQueue
{
    use Queueable;
    public function __construct()
    {
        //
    }

   
}
