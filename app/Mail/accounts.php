<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class accounts extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $link;
    public $emailMessage;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $link, $emailMessage)
    {
        //
      $this->name = $name;
      $this->link = $link;
      $this->emailMessage = $emailMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('verifications@dhs.org.za')
                    ->view('accounts_mail');
    }
}
