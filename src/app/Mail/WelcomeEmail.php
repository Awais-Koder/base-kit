<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     */
    // public function build()
    // {
    //     return $this->subject('Welcome to Our Platform')
    //                 ->view('emails.welcome')
    //                 ->with([
    //                     'name' => $this->user->name,
    //                     // You can pass additional data to the view if required
    //                 ]);
    // }

    public function build()
    {
        return $this->view('emails.welcome') // Replace with your email view
                    ->with([
                        'name' => $this->user->name,
                        // You can pass additional data to the view if required
                    ])
                    ->withSwiftMessage(function ($message) {
                        $message->getHeaders()
                                ->addTextHeader('X-PM-TrackOpens', 'true');
                    });
    }


}
