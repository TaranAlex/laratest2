<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Spam extends Mailable
{
    use Queueable, SerializesModels;

    protected $rand;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($rand)
    {
        $this->rand = $rand;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('aaa@mail.ru')->view('mails.spam', ['rand' => $this->rand]);
    }
}
