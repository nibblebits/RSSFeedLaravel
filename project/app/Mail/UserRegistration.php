<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserRegistration extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $user;
    private $generated_password;
    public function __construct(User $user, $generated_password)
    {
        $this->user = $user;
        $this->generated_password = $generated_password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.user_registration')->with(['user' => $this->user, 'generated_password' => $this->generated_password])
        ->subject('You have been registered');
    }
}
