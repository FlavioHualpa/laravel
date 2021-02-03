<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class VerifyMailAddress extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $verifyLink;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $verifyLink)
    {
        $this->user = $user;
        $this->verifyLink = $verifyLink;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.verify-email');
    }
}
