<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservationDetails extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $reservData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $reservData, $attach)
    {
        $this->user = $user;
        $this->reservData = $reservData;
        $this->subject = 'Detalle de su reservación';
        $this->attach($attach);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('markdown.reservation')
            ->with([
                'user' => $this->user,
                'reservData' => $this->reservData,
            ]);
    }
}
